<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HasilIndividuController extends Controller
{
    public function index()
    {
        // 1. Ambil data user yang sedang login
        $userId = Auth::id();

        // --- [MULAI TAMBAHAN LOGIKA SATPAM] ---

        // Kita cek dulu: Apakah user ini sudah punya data di tabel 'perhitungan'?
        $cekData = DB::table('perhitungan')
                    ->where('id_user', $userId)
                    ->exists(); // Ini akan mengembalikan true atau false

        // Jika TIDAK ADA data (belum menilai/belum dihitung)
        if (!$cekData) {
            return view('admin.hasil_individu', [
                'rankings' => collect([]), // Kita kirim array kosong biar gak error di loop
                'belumMenilai' => true     // INI KUNCINYA: buat trigger tampilan "Ops Data Kosong"
            ]);
        }

        // --- [SELESAI TAMBAHAN] ---


        // 2. Query Utama (Jalan hanya jika lolos pengecekan di atas)
        $rankings = DB::table('perhitungan')
            ->join('mk_plhn', 'perhitungan.id_mp', '=', 'mk_plhn.id_mp')
            ->where('perhitungan.id_user', $userId) // Filter hanya punya user yg login
            ->select(
                'mk_plhn.nama_mp',
                'mk_plhn.kode_mp',
                'perhitungan.hasil as nilai_preferensi'
            )
            ->orderByDesc('nilai_preferensi') // Urutkan dari terbesar (Ranking 1)
            ->get();

        // 3. Return View (Data Ada)
        return view('admin.hasil_individu', [
            'rankings' => $rankings,
            'belumMenilai' => false // Matikan trigger "Ops Data Kosong"
        ]);
    }
}
