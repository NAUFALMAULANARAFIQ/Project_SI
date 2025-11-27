<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SPK TOPSIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F1F3E0; /* Background utama */
        }
        /* Custom color pallet */
        .bg-primary { background-color: #778873; }
        .text-primary { color: #778873; }
        .bg-secondary { background-color: #A1BC98; }
        .text-secondary { color: #A1BC98; }
        .bg-dark-sidebar { background-color: #5d6b59; } /* Sedikit lebih gelap dari primary untuk sidebar */
        .active-link { background-color: #A1BC98; color: #778873; font-weight: 600; }
        .hover\:bg-active-link:hover { background-color: #D2DCB6; }
        .table-header { background-color: #D2DCB6; }
    </style>
</head>
<body>
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-dark-sidebar text-white flex-shrink-0 z-20 shadow-xl">
            <div class="p-6">
                <h1 class="text-2xl font-bold tracking-wider text-white">SPK TOPSIS</h1>
            </div>

            <nav class="p-4 space-y-2">

                <div class="text-xs font-semibold text-gray-300 uppercase tracking-wider mt-4 mb-2">Menu Utama</div>

                <!-- Dashboard Link (Active) -->
                <a href="/admin/dashboard" class="flex items-center p-3 rounded-lg active-link transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
                    <span class="ml-3">Dashboard</span>
                </a>

                <div class="text-xs font-semibold text-gray-300 uppercase tracking-wider pt-4 mb-2">Data Master</div>

                <!-- Matakuliah Link (Fixed Link) -->
                <a href="/admin/matakuliah" class="flex items-center p-3 rounded-lg hover:bg-active-link text-white hover:text-primary transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    <span class="ml-3">Matakuliah</span>
                </a>

                <!-- Kriteria Link (Fixed Link) -->
                <a href="/admin/kriteria" class="flex items-center p-3 rounded-lg hover:bg-active-link text-white hover:text-primary transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bar-chart-3"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
                    <span class="ml-3">Kriteria & Bobot</span>
                </a>

                <!-- Mahasiswa Link (Fixed Link) -->
                <a href="/admin/mahasiswa" class="flex items-center p-3 rounded-lg hover:bg-active-link text-white hover:text-primary transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <span class="ml-3">Mahasiswa</span>
                </a>

                <div class="text-xs font-semibold text-gray-300 uppercase tracking-wider pt-4 mb-2">Perhitungan</div>

                <!-- Perhitungan Link (Fixed Link) -->
                <a href="/mahasiswa/form" class="flex items-center p-3 rounded-lg hover:bg-active-link text-white hover:text-primary transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calculator"><rect width="16" height="20" x="4" y="2" rx="2"/><path d="M8 6h8"/><path d="M8 10h8"/><path d="M12 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/><path d="M16 18h.01"/><path d="M8 14h.01"/><path d="M16 14h.01"/></svg>
                    <span class="ml-3">Perhitungan SPK</span>
                </a>

            </nav>

            <div class="absolute bottom-4 w-full px-4">
                 <a href="/logout" class="flex items-center p-3 rounded-lg text-white hover:bg-red-600 transition duration-150">
                    <!-- Icon Logout -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/>
                    </svg>
                    <span class="ml-3">Logout (Admin)</span>
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto">
            <!-- Top Bar Header -->
            <header class="bg-white shadow-md h-16 flex items-center justify-between px-6 sticky top-0 z-10">
                <h2 class="text-xl font-semibold text-gray-700">Dashboard Utama</h2>
                <div class="flex items-center space-x-3">
                    <span class="text-sm font-medium text-gray-600">Selamat datang, Admin!</span>
                    <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white font-bold">A</div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                <h1 class="text-3xl font-bold text-primary mb-6">Ringkasan Sistem</h1>

                <!-- Cards Summary -->
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Card 1 -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-secondary">
                        <p class="text-sm text-gray-500">Total Matakuliah</p>
                        <p class="text-3xl font-bold text-primary">11</p>
                        <p class="text-xs text-gray-400">Data Matakuliah Pilihan</p>
                    </div>
                    <!-- Card 2 -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-primary">
                        <p class="text-sm text-gray-500">Total Kriteria</p>
                        <p class="text-3xl font-bold text-primary">5</p>
                        <p class="text-xs text-gray-400">Tingkat Kesulitan, Minat, dll.</p>
                    </div>
                    <!-- Card 3 -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-secondary">
                        <p class="text-sm text-gray-500">Total Pengguna</p>
                        <p class="text-3xl font-bold text-primary">25</p>
                        <p class="text-xs text-gray-400">Admin dan Mahasiswa</p>
                    </div>
                    <!-- Card 4 -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-primary">
                        <p class="text-sm text-gray-500">Perhitungan Tersimpan</p>
                        <p class="text-3xl font-bold text-primary">42</p>
                        <p class="text-xs text-gray-400">Riwayat Pengambilan Keputusan</p>
                    </div>
                </div>

                <!-- Main Section: Data Matakuliah Pilihan (Simulasi data master) -->
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-primary">Data Matakuliah Pilihan (Tabel Contoh)</h2>
                        <button class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary-dark transition duration-150 shadow-md hover:shadow-lg">
                            + Tambah Data
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="table-header">
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider rounded-tl-lg">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Kode MK</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Nama Matakuliah</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Semester</th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold text-primary uppercase tracking-wider rounded-tr-lg">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Data Row 1 -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">MAS2233</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Data Mining</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">4</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <button class="text-primary hover:text-secondary p-1 rounded-full transition duration-150">Edit</button>
                                        <button class="text-red-500 hover:text-red-700 p-1 rounded-full transition duration-150">Hapus</button>
                                    </td>
                                </tr>
                                <!-- Data Row 2 -->
                                <tr class="bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">2</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">MAS3232</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Tatakelola dan Audit SI</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">6</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <button class="text-primary hover:text-secondary p-1 rounded-full transition duration-150">Edit</button>
                                        <button class="text-red-500 hover:text-red-700 p-1 rounded-full transition duration-150">Hapus</button>
                                    </td>
                                </tr>
                                <!-- ... data lainnya ... -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>
</html>
