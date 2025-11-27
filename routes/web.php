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
    Route::get('/matakuliah', [DashboardController::class, 'matakuliah'])->name('admin.matakuliah');
    Route::get('/kriteria', [DashboardController::class, 'kriteria'])->name('admin.kriteria');
    Route::get('/mahasiswa', [DashboardController::class, 'mahasiswa'])->name('admin.mahasiswa');
});

Route::prefix('mahasiswa')->middleware('web')->group(function(){
    Route::get('/form', [DashboardController::class, 'perhitunganform'])->name('mahasiswa.perhitungan_form');
    Route::get('/hasil', [DashboardController::class, 'hasilperhitungan'])->name('mahasiswa.hasil_perhitungan');
});

Route::get('logout', [AuthController::class, 'logout']);
