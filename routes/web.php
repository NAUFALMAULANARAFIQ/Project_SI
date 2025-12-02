<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Mk_PlhnController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KepentinganController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\BordaController;

// Import Model untuk kebutuhan statistik Dashboard
use App\Models\Mk_Plhn;
use App\Models\Kriteria;
use App\Models\User;
use App\Models\Perhitungan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- 1. AUTHENTICATION & PUBLIC ROUTES ---
Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- 2. GROUP ADMIN (KETUA/KAPRODI) ---
Route::prefix('admin')->middleware(['checkLevel:ketua'])->group(function(){

    // DASHBOARD ADMIN (Dengan Logika Statistik)
    Route::get('/dashboard', function () {
        // 1. Hitung Statistik untuk Card di Dashboard
        $totalAlternatif = Mk_Plhn::count();
        $totalKriteria = Kriteria::count();
        $totalDM = User::where('level_user', 'anggota')->count();

        // 2. Hitung Progress Penilaian (%)
        $dosenSudahMenilai = Perhitungan::distinct('id_user')->count('id_user');
        $progressPersen = $totalDM > 0 ? round(($dosenSudahMenilai / $totalDM) * 100) : 0;

        // 3. Ambil Aktivitas Terakhir
        $recentActivities = Perhitungan::with('user')
                            ->orderBy('updated_at', 'desc')
                            ->get()
                            ->unique('id_user')
                            ->take(5);

        // Arahkan ke view 'ketua.dashboard' & kirim datanya
        // Pastikan nama view sesuai dengan folder kamu: resources/views/ketua/dashboard.blade.php
        return view('admin.dashboard', compact(
            'totalAlternatif',
            'totalKriteria',
            'totalDM',
            'progressPersen',
            'recentActivities'
        ));
    })->name('admin.dashboard');


    // 1. ALTERNATIF (Mata Kuliah)
    // Route Index manual agar sesuai nama di sidebar: 'admin.alternatif'
    Route::get('/alternatif', [Mk_PlhnController::class, 'index'])->name('admin.alternatif');

    // Route Resource untuk CRUD (Create, Store, Edit, Update, Destroy)
    Route::resource('alternatif', Mk_PlhnController::class)->except(['index'])->names([
        'create' => 'admin.alternatif.create',
        'store' => 'admin.alternatif.store',
        'edit' => 'admin.alternatif.edit',
        'update' => 'admin.alternatif.update',
        'destroy' => 'admin.alternatif.destroy',
    ]);


    // 2. KRITERIA
    Route::get('/kriteria', [KriteriaController::class, 'index'])->name('admin.kriteria');

    Route::resource('kriteria', KriteriaController::class)->except(['index'])->names([
        'create' => 'admin.kriteria.create',
        'store' => 'admin.kriteria.store',
        'edit' => 'admin.kriteria.edit',
        'update' => 'admin.kriteria.update',
        'destroy' => 'admin.kriteria.destroy',
    ]);


    // 3. DECISSION (Bobot Kepentingan)
    Route::get('/decission', [KepentinganController::class, 'index'])->name('admin.decission');

    Route::resource('decission', KepentinganController::class)->except(['index'])->names([
        'create' => 'admin.decission.create',
        'store' => 'admin.decission.store',
        'edit' => 'admin.decission.edit',
        'update' => 'admin.decission.update',
        'destroy' => 'admin.decission.destroy',
    ]);


    // 4. PENILAIAN (Admin Input)
    Route::get('/penilaian', [PerhitunganController::class, 'create'])->name('admin.penilaian');
    Route::post('/penilaian', [PerhitunganController::class, 'store'])->name('admin.penilaian.store');


    // 5. INDIVIDU (Hasil TOPSIS Perorangan)
    Route::get('/individu', [PerhitunganController::class, 'hasil'])->name('admin.individu');


    // 6. KELOMPOK (Hasil Konsensus Borda)
    // Digunakan oleh sidebar 'admin.hasil_kelompok'
    Route::get('/kelompok', [BordaController::class, 'index'])->name('admin.hasil_kelompok');

    // Alias route 'borda' jika ada link lain yang menggunakannya
    Route::get('/keputusan-borda', [BordaController::class, 'index'])->name('borda');


    // 7. LAPORAN
    // Sementara diarahkan ke hasil Borda
    Route::get('/laporan', [BordaController::class, 'index'])->name('admin.laporan');


    // 8. USER MANAGEMENT
    Route::resource('users', UserController::class)->names('admin.users');
});


// --- 3. GROUP MAHASISWA (ANGGOTA/DOSEN) ---
Route::prefix('mahasiswa')->middleware(['checkLevel:anggota'])->group(function(){

    // Dashboard Mahasiswa (Redirect ke form penilaian)
    Route::get('/dashboard', function(){
        return redirect()->route('mahasiswa.perhitungan_form');
    })->name('mahasiswa.dashboard');

    // Form Penilaian
    Route::get('/form', [PerhitunganController::class, 'create'])->name('mahasiswa.perhitungan_form');
    Route::post('/form', [PerhitunganController::class, 'store'])->name('mahasiswa.perhitungan_simpan');

    // Hasil Perhitungan
    Route::get('/hasil', [PerhitunganController::class, 'hasil'])->name('mahasiswa.hasil_perhitungan');
});
