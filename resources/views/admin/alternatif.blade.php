<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Matakuliah Pilihan - SPK TOPSIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #F1F3E0; }
        .bg-primary { background-color: #778873; } /* Hijau Gelap */
        .text-primary { color: #778873; }
        .bg-secondary { background-color: #A1BC98; } /* Hijau Sedang */
        .sidebar { background-color: #5d6b59; /* Hijau Sangat Gelap */ }
        .active-link { background-color: rgba(161, 188, 152, 0.3); color: #F1F3E0; font-weight: 600; }
        .card-bg { background-color: #ffffff; border-top: 4px solid #A1BC98; }
        .card-shadow { box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05), 0 4px 6px -2px rgba(0,0,0,0.03); }
    </style>
</head>
<body>
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar Navigation (Admin) -->
        <aside class="w-64 sidebar text-white flex-shrink-0 z-20 shadow-xl overflow-y-auto">
            <div class="p-6 pb-4 border-b border-gray-600/50">
                <h1 class="text-2xl font-bold tracking-wider text-white">GDSS</h1>
            </div>

            <nav class="p-4 space-y-1">

                <!-- Dashboard Link (ACTIVE) -->
                <a href="/admin/dashboard" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
                    <span class="ml-3">Dashboard</span>
                </a>

                <!-- Data Decision Maker -->
                <a href="/admin/decission" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <span class="ml-3">Data Decision Maker</span>
                </a>

                <!-- Data Alternatif -->
                <a href="/admin/alternatif" class="flex items-center p-3 rounded-lg active-link transition duration-150 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    <span class="ml-3">Data Alternatif</span>
                </a>

                <!-- Data Kriteria -->
                <a href="/admin/kriteria" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Z"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                    <span class="ml-3">Data Kriteria</span>
                </a>

                <!-- Form Penilaian -->
                <a href="/admin/penilaian" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M12 18V10"/></svg>
                    <span class="ml-3">Form Penilaian</span>
                </a>

                <!-- Hasil Individu -->
                <a href="/admin/individu" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/><polyline points="10 8 14 12 10 16"/></svg>
                    <span class="ml-3">Hasil Individu</span>
                </a>

                <!-- Hasil Kelompok -->
                <a href="/admin/kelompok" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 19c0 1.1-.9 2-2 2H9c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h6c1.1 0 2 .9 2 2v14z"/><path d="M7 10h10"/><path d="M7 14h10"/></svg>
                    <span class="ml-3">Hasil Kelompok</span>
                </a>

                <!-- Laporan -->
                <a href="/admin/laporan" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="14" y="2" width="6" height="6" rx="1"/><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M10 17h4"/></svg>
                    <span class="ml-3">Laporan</span>
                </a>

                <div class="pt-4 mt-2 border-t border-gray-600/50">
                     <!-- Profil Saya -->
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        <span class="ml-3">Profil Saya</span>
                    </a>

                    <!-- Logout -->
                    <a href="/logout" class="flex items-center p-3 rounded-lg text-red-300 hover:bg-red-600/50 transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
                        <span class="ml-3">Logout</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto">
            <header class="bg-white shadow-md h-16 flex items-center justify-between px-6 sticky top-0 z-10">
                <h2 class="text-xl font-semibold text-primary">Data Matakuliah Pilihan</h2>
                <div class="flex items-center space-x-3">
                    <span class="text-sm font-medium text-gray-600">Admin</span>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-secondary">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-primary">Kelola Matakuliah Pilihan</h2>
                        <button class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary-dark transition duration-150 shadow-md">
                            + Tambah Matakuliah
                        </button>
                    </div>

                    <!-- Search and Filter -->
                    <div class="flex justify-between items-center mb-4">
                        <input type="text" placeholder="Cari Matakuliah..." class="p-2 border border-D2DCB6 rounded-lg focus:ring-primary focus:border-primary">
                        <select class="p-2 border border-D2DCB6 rounded-lg focus:ring-primary focus:border-primary">
                            <option>Semua Semester</option>
                            <option>Semester 4</option>
                            <option>Semester 5</option>
                            <option>Semester 6</option>
                        </select>
                    </div>

                    <!-- Matakuliah Table -->
                    <div class="overflow-x-auto rounded-lg border border-D2DCB6">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="table-header">
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Kode MK</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Nama Matakuliah</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">SKS</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Semester</th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold text-primary uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Data Row 1 (Contoh dari jurnal) -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">MAS2231</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Pengolahan Citra Digital</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">3</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">4</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700 p-1 rounded-full transition duration-150" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700 p-1 rounded-full transition duration-150" title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Data Row 2 -->
                                <tr class="bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">2</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">MAS2232</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Perancangan Sumber Daya Perusahaan</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">3</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">4</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700 p-1 rounded-full transition duration-150" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700 p-1 rounded-full transition duration-150" title="Hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Tambahkan data lainnya di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
