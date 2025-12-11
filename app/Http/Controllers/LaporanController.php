<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan'); // Ini view form yang kamu kirim di atas
    }

    public function cetak(Request $request)
    {
        $jenis = $request->input('jenis_laporan');
        $semester = $request->input('semester_laporan');
        $judulLaporan = "";
        $data = [];

        if ($jenis == 'individu') {
            $judulLaporan = "Laporan Hasil Penilaian Individu (Semester $semester)";

            // Query Data Individu (Sesuaikan dengan tabelmu)
            // Contoh: Ambil data punya user yang sedang login
            $data = DB::table('perhitungan')
                    ->join('mk_plhn', 'perhitungan.id_mp', '=', 'mk_plhn.id_mp')
                    ->where('perhitungan.id_user', Auth::id())
                    ->select('mk_plhn.kode_mp', 'mk_plhn.nama_mp', 'perhitungan.hasil as nilai')
                    ->orderByDesc('nilai')
                    ->get();

        } else {
            $judulLaporan = "Laporan Hasil Konsensus Kelompok (Semester $semester)";

            // Query Data Kelompok (Borda/TOPSIS Group)
            // Pastikan tabelnya sesuai (misal: hasil_akhir)
            $data = DB::table('hasil_akhir') // ganti nama tabel jika beda
                    ->join('mk_plhn', 'hasil_akhir.id_mp', '=', 'mk_plhn.id_mp')
                    ->select('mk_plhn.kode_mp', 'mk_plhn.nama_mp', 'hasil_akhir.nilai_akhir as nilai')
                    ->orderByDesc('nilai')
                    ->get();
        }

        // Lempar data ke View Cetak (Kertas Putih)
        return view('admin.cetak', compact('data', 'judulLaporan', 'jenis', 'semester'));
    }
}
