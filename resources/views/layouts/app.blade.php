<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDSS TOPSIS - @yield('title')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body { min-height: 100vh; display: flex; flex-direction: column; background-color: #f0f2f5; }
        .wrapper { display: flex; flex: 1; }
        .sidebar {
            min-width: 260px;
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
            color: white;
            min-height: 100vh;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .sidebar-header { padding: 20px; background: rgba(0,0,0,0.1); border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: rgba(255,255,255,0.1);
            color: #fff;
            border-left-color: #3498db;
        }
        .content { flex: 1; padding: 30px; }
        .navbar-custom { background-color: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .card { border: none; box-shadow: 0 0 15px rgba(0,0,0,0.05); border-radius: 10px; }
    </style>
</head>
<body>

    @php
        // Ambil User dari Session Manual
        $user = session('user_session');
    @endphp

    <!-- Navbar Atas -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom px-4">
        <a class="navbar-brand fw-bold text-primary" href="#">
            <i class="fas fa-network-wired me-2"></i>GDSS KURIKULUM
        </a>
        <div class="ms-auto d-flex align-items-center">
            <div class="me-3 text-end">
                <div class="fw-bold small">{{ $user->username ?? 'Guest' }}</div>
                <div class="text-muted small" style="font-size: 0.75rem;">
                    {{ $user->level_user === 'admin' ? 'Ketua (Kaprodi)' : 'Anggota (Dosen)' }}
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </nav>

    <div class="wrapper">
        <!-- Sidebar Kiri -->
        <div class="sidebar">
            <div class="sidebar-header mb-3">
                <small class="text-uppercase text-muted fw-bold" style="font-size: 0.7rem;">Menu Utama</small>
            </div>

            @if($user && $user->level_user == 'admin')
                <!-- MENU KAPRODI (ADMIN) -->
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt me-3" style="width: 20px"></i> Dashboard
                </a>

                <div class="mt-4 mb-2 px-4 text-muted small text-uppercase fw-bold" style="font-size: 0.7rem;">Master Data</div>

                <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <i class="fas fa-users-cog me-3" style="width: 20px"></i> Decision Makers
                </a>
                <a href="{{ route('admin.matakuliah.index') }}" class="{{ request()->routeIs('admin.matakuliah*') ? 'active' : '' }}">
                    <i class="fas fa-book me-3" style="width: 20px"></i> Mata Kuliah (Alternatif)
                </a>
                <a href="{{ route('admin.kriteria.index') }}" class="{{ request()->routeIs('admin.kriteria*') ? 'active' : '' }}">
                    <i class="fas fa-list-ul me-3" style="width: 20px"></i> Kriteria Penilaian
                </a>
                <a href="{{ route('admin.bobot.index') }}" class="{{ request()->routeIs('admin.bobot*') ? 'active' : '' }}">
                    <i class="fas fa-weight-hanging me-3" style="width: 20px"></i> Bobot Preferensi
                </a>

                <!-- Nanti kita tambah menu Konsensus Borda di sini -->

            @elseif($user && $user->level_user == 'mahasiswa')
                <!-- MENU DOSEN ANGGOTA -->
                <a href="{{ route('perhitungan.create') }}" class="{{ request()->routeIs('perhitungan.create') ? 'active' : '' }}">
                    <i class="fas fa-edit me-3" style="width: 20px"></i> Input Penilaian
                </a>
                <a href="{{ route('perhitungan.hasil') }}" class="{{ request()->routeIs('perhitungan.hasil') ? 'active' : '' }}">
                    <i class="fas fa-chart-bar me-3" style="width: 20px"></i> Hasil Perhitungan Saya
                </a>
            @endif
        </div>

        <!-- Konten Kanan -->
        <div class="content">
            @if(session('success'))
                <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger border-0 shadow-sm alert-dismissible fade show">
                    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
