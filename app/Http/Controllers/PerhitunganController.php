<?php
namespace App\Http\Controllers;

use App\Models\Perhitungan;
use App\Models\Perhitungan_Detail;
use App\Models\Mk_Plhn;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PerhitunganController extends Controller
{
    public function create()
    {
        $mataKuliah = Mk_Plhn::all();
        $kriterias = Kriteria::all();
        return view('mahasiswa.perhitungan_form', compact('mataKuliah', 'kriterias'));
    }

    public function store(Request $request)
    {
        // Sesuaikan cara ambil user ID sesuai AuthController kamu
        $user = Session::get('user_session');
        $userId = $user->id_user;

        $request->validate([
            'nilai' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            // 1. Hapus penilaian lama user ini (agar bersih saat update)
            // Kita cari id_perhitungan milik user ini dulu
            $oldCalcs = Perhitungan::where('id_user', $userId)->pluck('id_perhitungan');
            Perhitungan_Detail::whereIn('id_perhitungan', $oldCalcs)->delete();
            Perhitungan::where('id_user', $userId)->delete();

            // 2. Simpan Nilai Mentah
            foreach ($request->nilai as $id_mp => $kriteria_nilai) {
                $perhitungan = Perhitungan::create([
                    'id_user' => $userId,
                    'id_mp' => $id_mp,
                    'hasil' => 0 // Nanti diupdate setelah hitung TOPSIS
                ]);

                foreach ($kriteria_nilai as $id_kriteria => $bobot) {
                    Perhitungan_Detail::create([
                        'id_perhitungan' => $perhitungan->id_perhitungan,
                        'id_user' => $userId,
                        'id_mp' => $id_mp,
                        'id_kriteria' => $id_kriteria,
                        'bobot' => $bobot
                    ]);
                }
            }

            // 3. TRIGGER HITUNG TOPSIS OTOMATIS DI SINI
            $this->hitungTopsisIndividu($userId);

            DB::commit();
            return redirect()->route('mahasiswa_hasil_perhitungan')->with('success', 'Penilaian berhasil disimpan dan dihitung.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Fungsi Private untuk menghitung TOPSIS per user
    private function hitungTopsisIndividu($userId)
    {
        $kriterias = Kriteria::all();
        $perhitungans = Perhitungan::with('details')->where('id_user', $userId)->get();

        if ($perhitungans->isEmpty()) return;

        // Step 1: Pembagi (Normalisasi)
        $pembagi = [];
        foreach ($kriterias as $k) {
            $sumKuadrat = 0;
            // Ambil semua detail user ini untuk kriteria K
            $details = Perhitungan_Detail::where('id_user', $userId)
                        ->where('id_kriteria', $k->id_kriteria)->get();
            foreach ($details as $d) {
                $sumKuadrat += pow($d->bobot, 2);
            }
            $pembagi[$k->id_kriteria] = sqrt($sumKuadrat);
        }

        // Step 2 & 3: Matriks Terbobot (Y) & Solusi Ideal
        $solusiPositif = [];
        $solusiNegatif = [];
        $matriksY = [];

        // Inisialisasi array min/max
        foreach ($kriterias as $k) {
            $matriksY[$k->id_kriteria] = [];
        }

        foreach ($perhitungans as $p) {
            foreach ($p->details as $d) {
                // Normalisasi * Bobot Kriteria
                $nilaiR = ($pembagi[$d->id_kriteria] > 0) ? $d->bobot / $pembagi[$d->id_kriteria] : 0;
                $nilaiY = $nilaiR * $d->kriteria->bobot;

                $matriksY[$d->id_kriteria][] = $nilaiY;
                // Simpan sementara untuk akses nanti (bisa dioptimasi)
                $d->nilai_y_temp = $nilaiY;
            }
        }

        // Cari A+ dan A-
        foreach ($kriterias as $k) {
            if ($k->cost_benefit == 'benefit') {
                $solusiPositif[$k->id_kriteria] = max($matriksY[$k->id_kriteria]);
                $solusiNegatif[$k->id_kriteria] = min($matriksY[$k->id_kriteria]);
            } else {
                $solusiPositif[$k->id_kriteria] = min($matriksY[$k->id_kriteria]);
                $solusiNegatif[$k->id_kriteria] = max($matriksY[$k->id_kriteria]);
            }
        }

        // Step 4: Jarak & Nilai Preferensi (V)
        foreach ($perhitungans as $p) {
            $dPos = 0;
            $dNeg = 0;
            foreach ($p->details as $d) {
                $y = $d->nilai_y_temp; // Nilai Y yang sudah dihitung tadi
                $dPos += pow($y - $solusiPositif[$d->id_kriteria], 2);
                $dNeg += pow($y - $solusiNegatif[$d->id_kriteria], 2);
            }
            $jarakPos = sqrt($dPos);
            $jarakNeg = sqrt($dNeg);

            // Rumus V
            $hasilV = ($jarakPos + $jarakNeg > 0) ? $jarakNeg / ($jarakNeg + $jarakPos) : 0;

            // Update Database
            $p->hasil = $hasilV;
            $p->save();
        }
    }

    public function hasil()
    {
        $user = Session::get('user_session');
        $hasilAkhir = Perhitungan::with('mkPlhn')
                        ->where('id_user', $user->id_user)
                        ->orderByDesc('hasil')
                        ->get();
        // Jika user adalah ketua (admin), tunjukkan view admin untuk hasil individu
        if(isset($user->level_user) && $user->level_user === 'ketua'){
            return view('admin.hasil_individu', compact('hasilAkhir'));
        }

        return view('mahasiswa.hasil_perhitungan', compact('hasilAkhir'));
    }
}
