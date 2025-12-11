<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Penilaian;
use App\Models\Kriteria;
use App\Models\Perhitungan;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    public static function hitungTopsis($userId)
    {
        // ----------------------------------------------------------------------
        // PERSIAPAN DATA (Sesuai Poin 1 & 3 di Excel)
        // ----------------------------------------------------------------------

        // Ambil data penilaian milik user (Mahasiswa Semester IV)
        $nilaiMentah = Penilaian::where('id_user', $userId)->get();

        if ($nilaiMentah->isEmpty()) {
            return;
        }

        $kriterias = Kriteria::all();

        // Group data berdasarkan Alternatif (Mata Kuliah: A1, A2, A3)
        // $dataMK = [ 'id_mp_A1' => [nilai C1, C2...], 'id_mp_A2' => [...] ]
        $dataMK = $nilaiMentah->groupBy('id_mp');

        // ----------------------------------------------------------------------
        // TAHAP 1: PEMBAGI / NORMALISASI (Sesuai Poin 2 di Excel)
        // Rumus: Akar dari penjumlahan kuadrat setiap kolom kriteria
        // ----------------------------------------------------------------------
        $pembagi = [];

        foreach ($kriterias as $k) {
            $id_k = $k->id_kriteria;

            // Ambil kolom nilai untuk kriteria ini saja (misal kolom C1 untuk A1, A2, A3)
            $nilaiKolom = $nilaiMentah->where('id_kriteria', $id_k)->pluck('nilai');

            $sumKuadrat = 0;
            foreach ($nilaiKolom as $n) {
                $sumKuadrat += pow($n, 2);
            }

            // Contoh Excel C1: sqrt(5^2 + 3^2 + 4^2) = sqrt(50) = 7.071...
            $pembagi[$id_k] = ($sumKuadrat > 0) ? sqrt($sumKuadrat) : 1;
        }
        // dd($pembagi);

        // ----------------------------------------------------------------------
        // TAHAP 2: MATRIKS TERNORMALISASI TERBOBOT (Sesuai Poin 5 di Excel)
        // Rumus: (Nilai Asli / Pembagi) * Bobot Kriteria
        // ----------------------------------------------------------------------
        $matriksY = [];
        $nilaiPerKriteriaY = []; // Array bantu untuk mencari Max/Min nanti

        foreach ($dataMK as $id_mp => $items) {
            foreach ($items as $item) {
                $id_k = $item->id_kriteria;
                $val  = $item->nilai; // Nilai asli (misal 5)

                $currKriteria = $kriterias->where('id_kriteria', $id_k)->first();
                if (!$currKriteria) continue;

                // 1. Normalisasi (R)
                $r = $val / $pembagi[$id_k];

                // 2. Kali Bobot (Y)
                // Pastikan bobot di DB tipe integer (4, 3, 3) bukan persen (0.4) agar sesuai Excel
                $y = $r * $currKriteria->bobot;

                // Simpan untuk perhitungan selanjutnya
                $matriksY[$id_mp][$id_k] = $y;
                $nilaiPerKriteriaY[$id_k][] = $y;
            }
        }

        // ----------------------------------------------------------------------
        // TAHAP 3: SOLUSI IDEAL POSITIF & NEGATIF (Sesuai Poin 6 di Excel)
        // C1 = Cost, C2-C5 = Benefit
        // ----------------------------------------------------------------------
        $A_Positif = [];
        $A_Negatif = [];

        foreach ($kriterias as $k) {
            $id_k = $k->id_kriteria;
            $kumpulanNilai = collect($nilaiPerKriteriaY[$id_k] ?? []);

            if ($kumpulanNilai->isEmpty()) {
                $A_Positif[$id_k] = 0; $A_Negatif[$id_k] = 0;
                continue;
            }

            // CEK SIFAT KRITERIA DARI DATABASE
            // Pastikan kolom 'sifat' di tabel kriteria berisi 'Cost' atau 'Benefit'
            if (strcasecmp($k->sifat, 'Cost') == 0) {
                // KASUS COST (Seperti C1 di Excel)
                // Ideal Positif = Nilai Terkecil (Min)
                // Ideal Negatif = Nilai Terbesar (Max)
                $A_Positif[$id_k] = $kumpulanNilai->min();
                $A_Negatif[$id_k] = $kumpulanNilai->max();
            } else {
                // KASUS BENEFIT (Seperti C2, C3, C4, C5 di Excel)
                // Ideal Positif = Nilai Terbesar (Max)
                // Ideal Negatif = Nilai Terkecil (Min)
                $A_Positif[$id_k] = $kumpulanNilai->max();
                $A_Negatif[$id_k] = $kumpulanNilai->min();
            }
        }

        // ----------------------------------------------------------------------
        // TAHAP 4 & 5: JARAK DAN SKOR PREFERENSI (Sesuai Poin 7 & 8 di Excel)
        // ----------------------------------------------------------------------

        foreach ($matriksY as $id_mp => $nilaiKriteria) {
            $sigmaPos = 0;
            $sigmaNeg = 0;

            foreach ($kriterias as $k) {
                $id_k = $k->id_kriteria;
                $y    = $nilaiKriteria[$id_k] ?? 0;

                // Jarak ke Solusi Ideal Positif (D+)
                $sigmaPos += pow(($y - $A_Positif[$id_k]), 2);

                // Jarak ke Solusi Ideal Negatif (D-)
                $sigmaNeg += pow(($y - $A_Negatif[$id_k]), 2);
            }

            $dPos = sqrt($sigmaPos); // Hasil Poin 7 (Kolom Kiri)
            $dNeg = sqrt($sigmaNeg); // Hasil Poin 7 (Kolom Kanan)

            // Hitung Skor Preferensi (V) - Poin 8
            // Rumus: D- / (D- + D+)
            $v = 0;
            if (($dNeg + $dPos) > 0) {
                $v = $dNeg / ($dNeg + $dPos);
            }

            // ------------------------------------------------------------------
            // PENYIMPANAN HASIL (Untuk Poin 9: Perangkingan)
            // ------------------------------------------------------------------
            Perhitungan::updateOrCreate(
                [
                    'id_user' => $userId,
                    'id_mp'   => $id_mp
                ],
                [
                    'hasil' => $v
                    // Tips: Ranking biasanya dilakukan saat "SELECT ... ORDER BY hasil DESC"
                ]
            );
        }
    }
}
