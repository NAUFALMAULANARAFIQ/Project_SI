<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mk_Plhn;
use App\Models\Perhitungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BordaController extends Controller
{
    public function index()
    {
        // 1. Ambil semua dosen yang sudah melakukan penilaian
        $dosenIds = Perhitungan::select('id_user')->distinct()->pluck('id_user');

        if($dosenIds->isEmpty()) {
            return view('admin.hasil_kelompok', ['msg' => 'Belum ada data penilaian masuk.']);
        }

        $bordaScores = []; // Array untuk menyimpan skor: [id_mp => total_poin]
        $mataKuliah = Mk_Plhn::all();

        // Inisialisasi skor 0 untuk semua MK
        foreach($mataKuliah as $mk) {
            $bordaScores[$mk->id_mp] = 0;
        }

        // Jumlah Mata Kuliah (n) untuk rumus Borda
        // Jika ranking 1, dapat poin = n
        // Jika ranking 2, dapat poin = n-1, dst.
        $n = $mataKuliah->count();

        // 2. Loop setiap dosen untuk ambil ranking individual mereka
        foreach($dosenIds as $uid) {
            // Ambil hasil TOPSIS user tersebut, urutkan dari nilai tertinggi (Ranking 1)
            $rankings = Perhitungan::where('id_user', $uid)
                            ->orderByDesc('hasil')
                            ->get();

            // Loop ranking individual
            foreach($rankings as $index => $data) {
                // $index 0 adalah ranking 1.
                // Poin = $n - $index.
                // Contoh: 5 MK. Rank 1 (index 0) = 5 - 0 = 5 poin.
                $poin = $n - $index;

                // Tambahkan ke total skor Borda
                if(isset($bordaScores[$data->id_mp])) {
                    $bordaScores[$data->id_mp] += $poin;
                }
            }
        }

        // 3. Format hasil akhir untuk View
        $hasilBorda = [];
        foreach($bordaScores as $id_mp => $skor) {
            $mk = $mataKuliah->find($id_mp);
            $hasilBorda[] = [
                'kode_mp' => $mk->kode_mp,
                'nama_mp' => $mk->nama_mp,
                'poin' => $skor
            ];
        }

        // Urutkan berdasarkan Poin Tertinggi (Descending)
        usort($hasilBorda, function($a, $b) {
            return $b['poin'] <=> $a['poin'];
        });

        return view('admin.hasil_kelompok', compact('hasilBorda'));
    }
}
