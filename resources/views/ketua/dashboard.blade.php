@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0">
        <div class="card-body text-center p-5">
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/29/Logo_Universitas_Riau.png" alt="Logo UNRI" width="150" class="mb-4">

            <h2 class="fw-bold text-success">GDSS TOPSIS + BORDA</h2>
            <h4 class="mb-3">UNIVERSITAS RIAU</h4>

            <p class="lead text-muted">
                Group Decision Support System (GDSS) untuk Penentuan Mata Kuliah Pilihan Prioritas<br>
                pada Program Studi Sistem Informasi FMIPA Universitas Riau.
            </p>

            <hr class="my-4">

            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">Decision Makers</div>
                        <div class="card-body">
                            {{-- Menghitung jumlah User (Kaprodi + Dosen) --}}
                            <h1 class="card-title">{{ \App\Models\User::count() }}</h1>
                            <small class="text-light">Ketua & Anggota</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">Mata Kuliah</div>
                        <div class="card-body">
                            <h1 class="card-title">{{ \App\Models\Mk_Plhn::count() }}</h1>
                            <small class="text-light">Alternatif Pilihan</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header">Kriteria</div>
                        <div class="card-body">
                            <h1 class="card-title">{{ \App\Models\Kriteria::count() }}</h1>
                            <small class="text-light">Aspek Penilaian</small>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">Skala Bobot</div>
                        <div class="card-body">
                            {{-- Mengganti Mahasiswa dengan Data Skala Kepentingan --}}
                            <h1 class="card-title">{{ \App\Models\Kepentingan::count() }}</h1>
                            <small class="text-light">Level Kepentingan</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                 <p class="text-muted small">
                     Silakan gunakan menu di samping untuk mengelola Decision Maker, Mata Kuliah, dan Kriteria.<br>
                     Hasil Konsensus Borda dapat diakses setelah semua anggota memberikan penilaian.
                 </p>
             </div>
        </div>
    </div>
</div>
@endsection
