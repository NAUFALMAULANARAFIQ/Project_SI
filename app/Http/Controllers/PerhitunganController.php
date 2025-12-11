<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Penilaian;
use App\Models\Kriteria;
use App\Models\Perhitungan;

class PerhitunganController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $rankings = DB::table('perhitungan')
            ->join('mk_plhn', 'perhitungan.id_mp', '=', 'mk_plhn.id_mp')
            ->where('perhitungan.id_user', $userId)
            ->select('mk_plhn.nama_mp', 'mk_plhn.kode_mp', 'perhitungan.hasil as nilai_preferensi')
            ->orderByDesc('nilai_preferensi')
            ->get();

        return view('admin.individu', compact('rankings'));
    }

    // --- LOGIKA TOPSIS (YANG SUDAH DIPERBAIKI SESUAI EXCEL) ---
    public static function hitungTopsis($userId)
    {
        // ==========================================================================
        // 1. PERSIAPAN: LOAD DATA KE ARRAY MATRIX (X)
        // ==========================================================================
        $kriterias = Kriteria::all();
        $penilaians = Penilaian::where('id_user', $userId)->get();

        if ($penilaians->isEmpty()) return;

        // Susun Array Matriks X: $X[id_mp][id_kriteria] = nilai mentah
        $X = [];
        foreach ($penilaians as $p) {
            $X[$p->id_mp][$p->id_kriteria] = $p->nilai;
        }

        // Ambil daftar Alternatif (Mata Kuliah)
        $alternatifs = array_keys($X);

        // ==========================================================================
        // 2. TAHAP PEMBAGI (Mencari Akar Kuadrat Sigma)
        // Ini adalah penyebutnya (contoh: Akar 50 = 7.071)
        // ==========================================================================
        $pembagi = [];

        foreach ($kriterias as $k) {
            $id_k = $k->id_kriteria;
            $sumKuadrat = 0;

            // Loop vertikal (per kolom kriteria)
            foreach ($alternatifs as $id_mp) {
                $nilai = $X[$id_mp][$id_k] ?? 0; // Contoh: 5, 3, 4
                $sumKuadrat += pow($nilai, 2);   // 5^2 + 3^2 + 4^2
            }

            // Simpan hasil Akar Kuadratnya
            $pembagi[$id_k] = sqrt($sumKuadrat);
        }

        // ==========================================================================
        // 3. MATRIKS TERNORMALISASI (R) & TERBOBOT (Y)
        // Disinilah proses "5 dibagi Akar 50" terjadi!
        // ==========================================================================
        $Y = [];
        $arrY_per_Kriteria = [];

        foreach ($alternatifs as $id_mp) {
            foreach ($kriterias as $k) {
                $id_k = $k->id_kriteria;
                $nilaiAsli = $X[$id_mp][$id_k] ?? 0; // Ini angkanya (misal: 5)
                $div = $pembagi[$id_k];              // Ini pembaginya (misal: 7.071)

                // --- [RUMUS R: Normalisasi] ---
                // "5 / Akar 50" terjadi disini:
                $r = ($div > 0) ? ($nilaiAsli / $div) : 0;

                // --- [RUMUS Y: Terbobot] ---
                // Hasil tadi dikali bobot (misal 4)
                $y_score = $r * $k->bobot;

                // Simpan hasilnya
                $Y[$id_mp][$id_k] = $y_score;
                $arrY_per_Kriteria[$id_k][] = $y_score;
            }
        }

        // ==========================================================================
        // 4. SOLUSI IDEAL A+ DAN A-
        // ==========================================================================
        $A_Plus = [];
        $A_Min  = [];

        foreach ($kriterias as $k) {
            $id_k = $k->id_kriteria;
            $colValues = $arrY_per_Kriteria[$id_k] ?? [];

            if (empty($colValues)) {
                $A_Plus[$id_k] = 0; $A_Min[$id_k] = 0; continue;
            }

            if (strcasecmp($k->sifat, 'Cost') == 0) {
                // Cost: Ideal(+) = Min, Ideal(-) = Max
                $A_Plus[$id_k] = min($colValues);
                $A_Min[$id_k]  = max($colValues);
            } else {
                // Benefit: Ideal(+) = Max, Ideal(-) = Min
                $A_Plus[$id_k] = max($colValues);
                $A_Min[$id_k]  = min($colValues);
            }
        }

        // ==========================================================================
        // 5 & 6. JARAK (D) DAN NILAI PREFERENSI (V)
        // ==========================================================================
        foreach ($alternatifs as $id_mp) {
            $sigmaPos = 0;
            $sigmaNeg = 0;

            foreach ($kriterias as $k) {
                $id_k = $k->id_kriteria;
                $y = $Y[$id_mp][$id_k];

                $sigmaPos += pow(($y - $A_Plus[$id_k]), 2);
                $sigmaNeg += pow(($y - $A_Min[$id_k]), 2);
            }

            $dPos = sqrt($sigmaPos);
            $dNeg = sqrt($sigmaNeg);

            // Hitung V
            $v = 0;
            if (($dNeg + $dPos) > 0) {
                $v = $dNeg / ($dNeg + $dPos);
            }

            // Simpan ke Database
            Perhitungan::updateOrCreate(
                ['id_user' => $userId, 'id_mp' => $id_mp],
                ['hasil' => $v]
            );
        }
    }

    public function group()
    {
        // 1. AMBIL DATA DENGAN RELASI
        // Pastikan Model Perhitungan punya relasi 'user' dan 'mk_plhn'
        $semuaHasil = Perhitungan::with(['user', 'mk_plhn'])->get();

        // Cek jika kosong
        if ($semuaHasil->isEmpty()) {
            return view('admin.kelompok.index', [
                'rankings' => [],
                'detailUser' => []
            ]);
        }

        // 2. GROUPING BERDASARKAN USER
        $dataPerUser = $semuaHasil->groupBy('id_user');

        // Variabel Penampung
        $bordaScores = [];
        $detailPerUser = [];

        // 3. LOGIKA BORDA
        foreach ($dataPerUser as $userId => $items) {

            // Urutkan Ranking Individu (TOPSIS Tertinggi = Rank 1)
            $sortedItems = $items->sortByDesc('hasil')->values();
            $jumlahItem = $sortedItems->count();

            // Ambil Nama User (Safe check jika user terhapus)
            $namaUser = $items->first()->user->nama ?? $items->first()->user->username ?? 'User #'.$userId;

            // Loop item milik user ini
            foreach ($sortedItems as $index => $item) {
                $rank = $index + 1;
                $poin = ($jumlahItem - $rank) + 1;

                // INIT ARRAY JIKA BELUM ADA
                // (Ini bagian penting biar tidak error 'total_poin')
                if (!isset($bordaScores[$item->id_mp])) {
                    $bordaScores[$item->id_mp] = [
                        'total_poin' => 0,
                        'nama_mp' => $item->mk_plhn->nama_mp ?? 'Unknown',
                        'kode_mp' => $item->mk_plhn->kode_mp ?? '-',
                    ];
                }

                // TAMBAHKAN POIN
                $bordaScores[$item->id_mp]['total_poin'] += $poin;

                // AMBIL DETAIL PILIHAN JUARA 1 USER (Untuk Tabel Transparansi)
                if ($rank == 1) {
                    $detailPerUser[] = [
                        'nama_user' => $namaUser,
                        'pilihan_top' => $item->mk_plhn->nama_mp ?? 'Unknown',
                        'skor_topsis' => $item->hasil
                    ];
                }
            }
        }

        // 4. SORTING HASIL AKHIR (Poin Tertinggi diatas)
        uasort($bordaScores, function ($a, $b) {
            return $b['total_poin'] <=> $a['total_poin'];
        });

        // 5. RAPIKAN DATA FINAL
        // Disinilah properti 'total_poin' dibuat agar bisa dibaca di View
        $finalRankings = [];
        $rank = 1;
        foreach ($bordaScores as $id_mp => $data) {
            $finalRankings[] = (object) [
                'rank' => $rank++,
                'nama_mp' => $data['nama_mp'],
                'kode_mp' => $data['kode_mp'],
                'total_poin' => $data['total_poin']
            ];
        }

        // Kirim ke View
        return view('admin.kelompok.index', [
            'rankings' => $finalRankings,
            'detailUser' => $detailPerUser
        ]);
    }
}
