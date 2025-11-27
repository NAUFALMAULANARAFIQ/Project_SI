<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use App\Models\Perhitungan_Detail;
use App\Models\Mk_Plhn;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    // MENAMPILKAN FORM PENILAIAN
    public function create()
    {
        // PERBAIKAN: Tidak perlu ambil data mahasiswa lagi
        // Ambil semua Mata Kuliah (karena Dosen/Decision Maker menilai semua opsi)
        $mataKuliah = Mk_Plhn::all();
        $kriterias = Kriteria::all();

        return view('perhitungan.create', compact('mataKuliah', 'kriterias'));
    }

    // MENYIMPAN DATA PENILAIAN
    public function store(Request $request)
    {
        // PERBAIKAN: Ambil ID user dari Auth langsung
        $userId = Auth::id();

        $request->validate([
            'nilai' => 'required|array',
        ]);

        // Hapus penilaian lama jika user ini sudah pernah menilai (agar tidak duplikat saat revisi)
        // Opsional, tapi bagus untuk UX
        Perhitungan::where('user_id', $userId)->delete();
        Perhitungan_Detail::where('user_id', $userId)->delete();

        DB::transaction(function () use ($request, $userId) {
            foreach ($request->nilai as $id_mp => $kriteria_nilai) {

                // Simpan Header Perhitungan
                $perhitungan = Perhitungan::create([
                    'user_id' => $userId, // GANTI id_mhs JADI user_id
                    'id_mp' => $id_mp,
                    'hasil' => 0
                ]);

                foreach ($kriteria_nilai as $id_kriteria => $bobot) {
                    // Simpan Detail Perhitungan
                    Perhitungan_Detail::create([
                        'id_perhitungan' => $perhitungan->id_perhitungan,
                        'user_id' => $userId, // GANTI id_mhs JADI user_id
                        'id_mp' => $id_mp,
                        'id_kriteria' => $id_kriteria,
                        'bobot' => $bobot
                    ]);
                }
            }
        });

        return redirect()->route('perhitungan.hasil')->with('success', 'Penilaian berhasil disimpan! Menghitung TOPSIS...');
    }

    // HITUNG TOPSIS INDIVIDUAL (Per User)
    public function hasil()
    {
        $userId = Auth::id();

        // PERBAIKAN: Query ke user_id, bukan id_mhs
        $perhitungans = Perhitungan::with('details', 'mkPlhn')
                        ->where('user_id', $userId)
                        ->get();

        $kriterias = Kriteria::all();

        if ($perhitungans->isEmpty()) {
            return redirect()->route('perhitungan.create')->with('error', 'Silakan lakukan penilaian terlebih dahulu.');
        }

        // --- STEP 1: Matriks Keputusan (X) ---
        $matriks = [];
        foreach ($perhitungans as $p) {
            foreach ($p->details as $d) {
                $matriks[$p->id_mp][$d->id_kriteria] = $d->bobot;
            }
        }

        // --- STEP 2: Matriks Ternormalisasi (R) ---
        $pembagi = [];
        foreach ($kriterias as $k) {
            $sumKuadrat = 0;
            foreach ($matriks as $id_mp => $nilai_kriteria) {
                $nilai = $nilai_kriteria[$k->id_kriteria] ?? 0;
                $sumKuadrat += pow($nilai, 2);
            }
            $pembagi[$k->id_kriteria] = sqrt($sumKuadrat);
        }

        $matriksR = [];
        foreach ($matriks as $id_mp => $nilai_kriteria) {
            foreach ($kriterias as $k) {
                $val = $nilai_kriteria[$k->id_kriteria] ?? 0;
                $matriksR[$id_mp][$k->id_kriteria] = ($pembagi[$k->id_kriteria] > 0)
                    ? $val / $pembagi[$k->id_kriteria]
                    : 0;
            }
        }

        // --- STEP 3: Matriks Ternormalisasi Terbobot (Y) ---
        $matriksY = [];
        foreach ($matriksR as $id_mp => $nilai_kriteria) {
            foreach ($kriterias as $k) {
                $matriksY[$id_mp][$k->id_kriteria] = $nilai_kriteria[$k->id_kriteria] * $k->bobot;
            }
        }

        // --- STEP 4: Solusi Ideal Positif (A+) dan Negatif (A-) ---
        $solusiIdealPositif = [];
        $solusiIdealNegatif = [];

        foreach ($kriterias as $k) {
            $kolomNilai = array_column($matriksY, $k->id_kriteria);
            if ($k->cost_benefit == 'benefit') {
                $solusiIdealPositif[$k->id_kriteria] = max($kolomNilai);
                $solusiIdealNegatif[$k->id_kriteria] = min($kolomNilai);
            } else {
                $solusiIdealPositif[$k->id_kriteria] = min($kolomNilai);
                $solusiIdealNegatif[$k->id_kriteria] = max($kolomNilai);
            }
        }

        // --- STEP 5: Jarak Solusi Ideal (D+ dan D-) ---
        $jarakPositif = [];
        $jarakNegatif = [];

        foreach ($matriksY as $id_mp => $nilai_kriteria) {
            $totalPos = 0;
            $totalNeg = 0;
            foreach ($kriterias as $k) {
                $y = $nilai_kriteria[$k->id_kriteria];
                $totalPos += pow($y - $solusiIdealPositif[$k->id_kriteria], 2);
                $totalNeg += pow($y - $solusiIdealNegatif[$k->id_kriteria], 2);
            }
            $jarakPositif[$id_mp] = sqrt($totalPos);
            $jarakNegatif[$id_mp] = sqrt($totalNeg);
        }

        // --- STEP 6: Nilai Preferensi (V) ---
        $hasilAkhir = [];
        foreach ($perhitungans as $p) {
            $dPos = $jarakPositif[$p->id_mp];
            $dNeg = $jarakNegatif[$p->id_mp];

            // Hitung V
            $nilaiV = ($dPos + $dNeg > 0) ? $dNeg / ($dNeg + $dPos) : 0;

            // Update ke database (PENTING UNTUK BORDA NANTI)
            $p->hasil = $nilaiV;
            $p->save();

            $hasilAkhir[] = [
                'mk' => $p->mkPlhn, // Pastikan relasi di Model Perhitungan namanya mkPlhn
                'nilai' => $nilaiV,
            ];
        }

        // Urutkan Ranking (Terbesar ke Terkecil)
        usort($hasilAkhir, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        return view('perhitungan.hasil', compact('hasilAkhir', 'matriksY', 'solusiIdealPositif', 'solusiIdealNegatif'));
    }
}
