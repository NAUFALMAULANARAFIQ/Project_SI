@extends('layouts.app')

@section('title', 'Input Penilaian')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-1">Input Penilaian GDSS</h4>
            <p class="text-muted mb-0">Silakan berikan bobot penilaian untuk setiap Mata Kuliah berdasarkan Kriteria.</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-white py-3">
            <h6 class="mb-0 fw-bold text-primary"><i class="fas fa-pencil-alt me-2"></i>Formulir Penilaian Individual</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('perhitungan.store') }}" method="POST">
                @csrf

                <div class="alert alert-info border-0 d-flex align-items-center">
                    <i class="fas fa-info-circle me-3 fa-2x"></i>
                    <div>
                        <strong>Petunjuk:</strong><br>
                        Isi setiap sel dengan nilai skala 1-5 (Sesuai ketentuan Bobot Kepentingan).<br>
                        <small>1=Sangat Rendah, 2=Rendah, 3=Cukup, 4=Tinggi, 5=Sangat Tinggi</small>
                    </div>
                </div>

                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th rowspan="2" class="align-middle bg-light" style="width: 50px;">No</th>
                                <th rowspan="2" class="align-middle bg-light text-start">Alternatif (Mata Kuliah)</th>
                                <th colspan="{{ count($kriterias) }}" class="bg-light">Kriteria Penilaian</th>
                            </tr>
                            <tr>
                                @foreach($kriterias as $k)
                                    <th style="min-width: 120px;">
                                        <div class="small fw-bold">{{ $k->nama_kriteria }}</div>
                                        <div class="badge bg-secondary badge-sm" style="font-size: 0.6rem;">{{ strtoupper($k->cost_benefit) }}</div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mataKuliah as $index => $mk)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-start fw-bold">
                                    {{ $mk->nama_mp }} <br>
                                    <small class="text-muted">{{ $mk->kode_mp }}</small>
                                </td>
                                @foreach($kriterias as $k)
                                    <td class="p-2">
                                        <select name="nilai[{{ $mk->id_mp }}][{{ $k->id_kriteria }}]" class="form-select form-select-sm border-0 bg-light text-center" required>
                                            <option value="" selected disabled>-</option>
                                            <option value="1">1 (Sangat Rendah)</option>
                                            <option value="2">2 (Rendah)</option>
                                            <option value="3">3 (Cukup)</option>
                                            <option value="4">4 (Tinggi)</option>
                                            <option value="5">5 (Sangat Tinggi)</option>
                                        </select>
                                    </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="reset" class="btn btn-light me-2">Reset</button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i> Simpan Penilaian
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
