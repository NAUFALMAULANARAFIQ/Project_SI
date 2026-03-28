<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mk_Plhn;
use App\Models\Kriteria;
use App\Models\User;
use App\Models\Perhitungan; // Asumsi tabel ini menyimpan log aktivitas penilaian terakhir
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung Total Data (Untuk Card di atas)
        $totalAlternatif = Mk_Plhn::count();
        $totalKriteria   = Kriteria::count();

        // Hitung User yang levelnya 'ketua' (Kaprodi) atau 'anggota' (Dosen)
        $totalDM = User::whereIn('level_user', ['ketua', 'anggota'])->count();

        // 2. Ambil Aktivitas Terakhir
        // Mengambil 5 data terakhir dari tabel perhitungan, diurutkan dari yang terbaru
        $recentActivities = Perhitungan::with(['user', 'mkPlhn']) // Pastikan relasi di model Perhitungan sudah ada
            ->latest() // order by created_at desc
            ->take(5)
            ->get();

        // 3. Data User Login untuk Header
        $user = Auth::user();

        return view('admin.dashboard', compact(
            'totalAlternatif',
            'totalKriteria',
            'totalDM',
            'recentActivities',
            'user'
        ));
    }
}
