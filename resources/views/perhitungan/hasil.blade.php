@extends('layouts.app')

@section('title', 'Hasil Perhitungan')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h4 class="fw-bold">Hasil Perhitungan TOPSIS (Individual)</h4>
        <p class="text-muted">Berikut adalah hasil analisis berdasarkan penilaian yang Anda berikan.</p>
    </div>

    <!-- TAB NAVIGASI UNTUK MELIHAT PROSES -->
    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="rank-tab" data-bs-toggle="tab" data-bs-target="#rank" type="button">Ranking Akhir</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="matrix-tab" data-bs-toggle="tab" data-bs-target="#matrix" type="button">Detail Matriks</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">

        <!-- HASIL RANKING -->
        <div class="tab-pane fade show active" id="rank">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-success mb-4">Perangkingan Mata Kuliah Prioritas</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-success">
                                <tr>
                                    <th class="text-center" width="10%">Peringkat</th>
                                    <th>Mata Kuliah</th>
                                    <th>Nilai Preferensi (V)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hasilAkhir as $index => $row)
                                <tr>
                                    <td class="text-center fw-bold fs-5">#{{ $index + 1 }}</td>
                                    <td>
                                        <div class="fw-bold">{{ $row['mk']->nama_mp }}</div>
                                        <small class="text-muted">{{ $row['mk']->kode_mp }}</small>
                                    </td>
                                    <td>
                                        <div class="progress" style="height: 20px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $row['nilai'] * 100 }}%">
                                                {{ number_format($row['nilai'], 4) }}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- DETAIL MATRIKS (Y, A+, A-) -->
        <div class="tab-pane fade" id="matrix">
            <!-- Matriks Ternormalisasi Terbobot (Y) -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">1. Matriks Ternormalisasi Terbobot (Y)</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm text-center" style="font-size: 0.85rem;">
                            <thead class="table-light">
                                <tr>
                                    <th>Kode MP</th>
                                    @foreach($solusiIdealPositif as $id_kriteria => $val)
                                        <th>C{{ $id_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($matriksY as $id_mp => $nilai_kriteria)
                                <tr>
                                    <td class="fw-bold">{{ \App\Models\Mk_Plhn::find($id_mp)->kode_mp }}</td>
                                    @foreach($nilai_kriteria as $val)
                                        <td>{{ number_format($val, 4) }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Solusi Ideal -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">2. Solusi Ideal Positif (A+) & Negatif (A-)</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm text-center">
                            <thead>
                                <tr>
                                    <th>Solusi Ideal</th>
                                    @foreach($solusiIdealPositif as $id_kriteria => $val)
                                        <th>C{{ $id_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-success">
                                    <td class="fw-bold">Positif (A+)</td>
                                    @foreach($solusiIdealPositif as $val)
                                        <td>{{ number_format($val, 4) }}</td>
                                    @endforeach
                                </tr>
                                <tr class="table-danger">
                                    <td class="fw-bold">Negatif (A-)</td>
                                    @foreach($solusiIdealNegatif as $val)
                                        <td>{{ number_format($val, 4) }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
