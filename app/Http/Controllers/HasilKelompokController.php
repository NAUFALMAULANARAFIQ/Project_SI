<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Perhitungan; // Pastikan import model ini

class HasilKelompokController extends Controller
{
    public function index()
    {
        // 1. Ambil SEMUA data hasil perhitungan
        // Kita tidak bisa langsung pakai GroupBy di SQL karena butuh logic ranking per user dulu
        $semuaData = DB::table('perhitungan')
            ->join('mk_plhn', 'perhitungan.id_mp', '=', 'mk_plhn.id_mp')
            ->select('perhitungan.*', 'mk_plhn.nama_mp', 'mk_plhn.kode_mp')
            ->get();

        // 2. Kelompokkan Data Per User (Agar bisa kita ranking per orang)
        $dataPerUser = $semuaData->groupBy('id_user');

        // Array penampung Skor Borda
        // Format: [id_mp => Total Poin]
        $bordaScores = [];

        // Array bantu buat nyimpen Nama & Kode MP biar gak hilang
        $infoMP = [];

        // 3. LOGIC BORDA START
        foreach ($dataPerUser as $userId => $items) {
            // Urutkan matakuliah user ini berdasarkan nilai TOPSIS tertinggi (Ranking 1 paling atas)
            $sortedItems = $items->sortByDesc('hasil')->values();

            // Hitung jumlah item yang dinilai user ini (untuk penentuan poin maksimal)
            $count = $sortedItems->count();

            foreach ($sortedItems as $index => $item) {
                // Simpan info matakuliah (buat ditampilkan nanti)
                $infoMP[$item->id_mp] = [
                    'nama_mp' => $item->nama_mp,
                    'kode_mp' => $item->kode_mp
                ];

                // RUMUS BORDA:
                // Poin = (Jumlah Item - Index Ranking)
                // Contoh: Ada 5 Mapel.
                // Ranking 1 (index 0) -> Poin = 5 - 0 = 5
                // Ranking 5 (index 4) -> Poin = 5 - 4 = 1
                $poin = $count - $index;

                // Jumlahkan poin ke matakuliah tersebut
                if (!isset($bordaScores[$item->id_mp])) {
                    $bordaScores[$item->id_mp] = 0;
                }
                $bordaScores[$item->id_mp] += $poin;
            }
        }

        // 4. Urutkan Hasil Akhir (Poin Tertinggi diatas)
        arsort($bordaScores);

        // 5. Format Data Agar Bisa Dibaca View (Disamakan strukturnya kayak kodingan lamamu)
        $rankings = [];
        foreach ($bordaScores as $id_mp => $totalPoin) {
            $rankings[] = (object) [
                'nama_mp' => $infoMP[$id_mp]['nama_mp'],
                'kode_mp' => $infoMP[$id_mp]['kode_mp'],
                'nilai_akhir' => $totalPoin, // Ini sekarang adalah Total Poin Borda
                'jumlah_pemilih' => $semuaData->where('id_mp', $id_mp)->count() // Info tambahan
            ];
        }

        // Convert array ke Collection biar view-nya gak error kalau pakai method collection
        $rankings = collect($rankings);

        // Ambil Info Siapa Saja yang Sudah Menilai
        $voters = User::whereIn('id_user', $semuaData->pluck('id_user')->unique())->get();

        return view('admin.hasil_kelompok', compact('rankings', 'voters'));
    }
}
