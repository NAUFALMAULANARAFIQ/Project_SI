<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MkPlhnController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\HasilKelompokController;
use App\Http\Controllers\HasilIndividuController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PerhitunganController;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Alternatif (Mk_Plhn)
Route::prefix('admin/alternatif')->name('admin.alternatif.')->group(function () {
    Route::get('/', [MkPlhnController::class, 'index'])->name('index');
    Route::post('/', [MkPlhnController::class, 'store'])->name('store');
    Route::put('/{id}', [MkPlhnController::class, 'update'])->name('update');
    Route::delete('/{id}', [MkPlhnController::class, 'destroy'])->name('destroy');
});

// Kriteria
Route::prefix('admin/kriteria')->name('admin.kriteria.')->group(function () {
    Route::get('/', [KriteriaController::class, 'index'])->name('index');
    Route::post('/', [KriteriaController::class, 'store'])->name('store');
    Route::put('/{id}', [KriteriaController::class, 'update'])->name('update');
    Route::delete('/{id}', [KriteriaController::class, 'destroy'])->name('destroy');
});

// Decision Maker
Route::prefix('admin/decission')->name('admin.decission.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
});

// Penilaian
Route::prefix('admin/penilaian')->name('admin.penilaian.')->group(function () {
    Route::get('/', [PenilaianController::class, 'index'])->name('index');
    Route::post('/', [PenilaianController::class, 'store'])->name('store');
});

// Hasil Perhitungan
Route::get('/admin/individu',  [HasilIndividuController::class, 'index'])->name('admin.individu.index');
Route::get('/admin/kelompok',  [HasilKelompokController::class, 'index'])->name('admin.kelompok.index');

// Laporan
Route::prefix('admin/laporan')->name('admin.laporan.')->group(function () {
    Route::get('/', [LaporanController::class, 'index'])->name('index');
    Route::post('/cetak', [LaporanController::class, 'cetak'])->name('cetak');
});

Route::get('/hasil-kelompok', [PerhitunganController::class, 'group'])->name('perhitungan.group');

/*
|--------------------------------------------------------------------------
| Mahasiswa Routes
|--------------------------------------------------------------------------
*/

Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/form', [DashboardController::class, 'perhitunganform'])->name('form');
    Route::get('/hasil', [DashboardController::class, 'hasilperhitungan'])->name('hasil');
});

/*
|--------------------------------------------------------------------------
| Perhitungan (API + Form)
|--------------------------------------------------------------------------
*/

Route::prefix('perhitungan')->name('perhitungan.')->group(function () {
    Route::get('/create', [DashboardController::class, 'perhitunganform'])->name('create');
    Route::post('/', [PerhitunganController::class, 'store'])->name('store');
});

/*
|--------------------------------------------------------------------------
| Ketua Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/ketua/dashboard', function () {
    return view()->exists('ketua.dashboard')
        ? view('ketua.dashboard')
        : 'Ketua dashboard (view not found)';
})->name('ketua.dashboard');
