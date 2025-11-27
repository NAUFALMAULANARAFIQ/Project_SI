<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Mk_PlhnController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KepentinganController;
use App\Http\Controllers\PerhitunganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- 1. AREA TAMU (Guest) ---
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// --- 2. LOGOUT (Bisa diakses siapa saja yang punya sesi) ---
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ====================================================
// GRUP 1: ADMIN (Kaprodi / Ketua)
// ====================================================
// PENTING: Middleware 'checkLevel' harus sudah dimodifikasi
// agar membaca 'user_session' manual, bukan Auth::user() lagi.
Route::group(['prefix' => 'ketua', 'as' => 'ketua.', 'middleware' => 'checkLevel:ketua'], function () {

    Route::get('/dashboard', function () {
        return view('ketua.dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    // Route::resource('mahasiswa', MahasiswaController::class); // DIHAPUS

    Route::resource('matakuliah', Mk_PlhnController::class)->parameters(['matakuliah' => 'mk_plhn']);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('bobot', KepentinganController::class);
});


// ====================================================
// GRUP 2: DOSEN ANGGOTA (Dulu Mahasiswa)
// ====================================================
// Kita samakan prefix dengan AuthController: 'perhitungan'
Route::group(['prefix' => 'perhitungan', 'as' => 'perhitungan.', 'middleware' => 'checkLevel:anggota'], function () {

    // Halaman Utama Penilaian (GDSS Tahap 1)
    Route::get('/buat', [PerhitunganController::class, 'create'])->name('create');
    Route::post('/simpan', [PerhitunganController::class, 'store'])->name('store');
    Route::get('/hasil', [PerhitunganController::class, 'hasil'])->name('hasil');

    // Dashboard dummy (jika diperlukan redirect lain)
    Route::get('/dashboard', function () {
        return view('mahasiswa.dashboard');
    })->name('dashboard');
});


// Route Debugging (Opsional)
Route::get('/debug-session', function () {
    return session()->all();
});
