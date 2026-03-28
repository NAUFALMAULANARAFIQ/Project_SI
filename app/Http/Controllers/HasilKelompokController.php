<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HasilKelompokController extends Controller
{
    public function index()
    {
        // 1. AMBIL DATA
        $semuaData = DB::table('perhitungan')
            ->join('mk_plhn', 'perhitungan.id_mp', '=', 'mk_plhn.id_mp')
            ->select('perhitungan.*', 'mk_plhn.nama_mp', 'mk_plhn.kode_mp')
            ->get();

        // Cari tahu maksimal ranking (biasanya sama dengan jumlah matkul unik)
        // Ini buat nentuin jumlah kolom 1, 2, 3 dst
        $totalKandidat = $semuaData->unique('id_mp')->count();

        // 2. KELOMPOKKAN PER USER
        $dataPerUser = $semuaData->groupBy('id_user');

        $bordaScores = []; // Untuk Poin Borda (Weighted)
        $matrixSkor  = [];
        $infoMP      = [];

        foreach ($dataPerUser as $userId => $items) {
            // Urutkan nilai TOPSIS user (Ranking 1 paling atas)
            $sortedItems = $items->sortByDesc('hasil')->values();

            // Hitung jumlah item yang dinilai user ini untuk penentuan bobot
            $jumlahItemUser = $sortedItems->count();

            foreach ($sortedItems as $index => $item) {
                // Simpan info MP
                if (!isset($infoMP[$item->id_mp])) {
                    $infoMP[$item->id_mp] = [
                        'nama_mp' => $item->nama_mp,
                        'kode_mp' => $item->kode_mp
                    ];
                }

                // Tentukan Ranking (1, 2, 3...)
                // index 0 = Rank 1, index 1 = Rank 2
                $rankingPosisi = $index + 1;

                // --- 1. SIMPAN SKOR KE MATRIX (Untuk Kolom 1, 2, 3) ---
                if (!isset($matrixSkor[$item->id_mp][$rankingPosisi])) {
                    $matrixSkor[$item->id_mp][$rankingPosisi] = 0;
                }
                // Kita jumlahkan skor aslinya di posisi rank tersebut
                // (Ini biar angka 1,345589 muncul di kolom Ranking 2 kayak di Excel)
                $matrixSkor[$item->id_mp][$rankingPosisi] += $item->hasil;


                // --- 2. HITUNG POIN BORDA (Weighted) ---
                // Bobot = (Jumlah Item User - Index)
                // Misal Rank 1 dari 3 item = bobot 3. Rank 2 = bobot 2.
                $bobotRanking = $jumlahItemUser - $index;

                // Poin = Skor Asli * Bobot
                $poinHitung = $item->hasil * $bobotRanking;

                // Akumulasi Poin Borda
                if (!isset($bordaScores[$item->id_mp])) {
                    $bordaScores[$item->id_mp] = 0;
                }
                $bordaScores[$item->id_mp] += $poinHitung;
            }
        }

        // 3. HITUNG TOTAL & NORMALISASI
        $grandTotalPoin = array_sum($bordaScores);

        $rankings = [];
        foreach ($bordaScores as $id_mp => $totalPoin) {
            $nilaiAkhir = ($grandTotalPoin > 0) ? ($totalPoin / $grandTotalPoin) : 0;

            $rankings[] = (object) [
                'id_mp'        => $id_mp,
                'nama_mp'      => $infoMP[$id_mp]['nama_mp'],
                'kode_mp'      => $infoMP[$id_mp]['kode_mp'],
                'poin_borda'   => $totalPoin,
                'nilai_akhir'  => $nilaiAkhir,
                'detail_rank'  => $matrixSkor[$id_mp] ?? []
            ];
        }

        // Urutkan berdasarkan Nilai Akhir
        $rankings = collect($rankings)->sortByDesc('nilai_akhir')->values();
        $voters = User::whereIn('id_user', $semuaData->pluck('id_user')->unique())->get();

        return view('admin.hasil_kelompok', compact('rankings', 'voters', 'totalKandidat'));
    }
}
