<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'index']);
Route::prefix('admin')->middleware('web')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboardadmin'])->name('admin.dashboard');
    Route::get('/alternatif', [DashboardController::class, 'alternatif'])->name('admin.alternatif');
    Route::get('/kriteria', [DashboardController::class, 'kriteria'])->name('admin.kriteria');
    Route::get('/decission', [DashboardController::class, 'decission'])->name('admin.decission');
    // Route::get('/form', [DashboardController::class, 'perhitunganform'])->name('mahasiswa.perhitungan_form');
    // Route::get('/hasil', [DashboardController::class, 'hasilperhitungan'])->name('mahasiswa.hasil_perhitungan');
    Route::get('/penilaian', [DashboardController::class, 'penilaian'])->name('admin.penilaian');
    Route::get('/individu', [DashboardController::class, 'individu'])->name('admin.individu');
    Route::get('kelompok', [DashboardController::class, 'kelompok'])->name('admin.hasil_kelompok');
    Route::get('laporan', [DashboardController::class, 'laporan'])->name('admin.laporan');
});

Route::prefix('mahasiswa')->middleware('web')->group(function(){
    Route::get('/form', [DashboardController::class, 'perhitunganform'])->name('mahasiswa.perhitungan_form');
    Route::get('/hasil', [DashboardController::class, 'hasilperhitungan'])->name('mahasiswa.hasil_perhitungan');
});

Route::get('logout', [AuthController::class, 'logout']);
