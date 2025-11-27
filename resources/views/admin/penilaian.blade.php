<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian - SPK TOPSIS</title>
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

        <!-- Sidebar Navigation (DM) -->
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
                <a href="/admin/alternatif" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    <span class="ml-3">Data Alternatif</span>
                </a>

                <!-- Data Kriteria -->
                <a href="/admin/kriteria" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Z"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                    <span class="ml-3">Data Kriteria</span>
                </a>

                <!-- Form Penilaian -->
                <a href="/admin/penilaian" class="flex items-center p-3 rounded-lg active-link transition duration-150 text-white">
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
        <main class="flex-1 overflow-y-auto bg-[#fdfdfd]">
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 sticky top-0 z-10 border-b border-gray-100">
                <h2 class="text-xl font-semibold text-primary">Form Penilaian Matakuliah Pilihan</h2>
                <div class="flex items-center space-x-3 text-primary">
                    <span class="text-sm font-medium text-gray-600">Decision Maker 1 (Kaprodi)</span>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                <div class="bg-white p-8 rounded-xl card-shadow border-t-4 border-secondary">
                    <h1 class="text-2xl font-bold text-primary mb-6">Input Penilaian Kriteria Matakuliah</h1>

                    <form class="space-y-6">

                        <!-- Pilihan Semester/Matakuliah -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center border-b pb-4">
                            <div>
                                <label for="semester_pilihan" class="block text-sm font-semibold text-gray-700 mb-1">Pilih Semester Matakuliah:</label>
                                <select id="semester_pilihan" class="w-full p-3 border-2 border-gray-300 rounded-lg select-custom focus:border-primary focus:ring-primary">
                                    <option>-- Pilih Semester --</option>
                                    <option value="4">Semester IV (3 Matakuliah)</option>
                                    <option value="5">Semester V (4 Matakuliah)</option>
                                    <option value="6">Semester VI (7 Matakuliah)</option>
                                </select>
                            </div>
                            <div>
                                <label for="matakuliah_pilihan" class="block text-sm font-semibold text-gray-700 mb-1">Pilih Matakuliah yang dinilai:</label>
                                <select id="matakuliah_pilihan" name="matakuliah_pilihan"
                                    class="w-full p-3 border-2 border-gray-300 rounded-lg select-custom focus:border-primary focus:ring-primary">
                                    <option>-- Pilih Matakuliah --</option>
                                    <option value="A1">Pengolahan Citra Digital</option>
                                    <option value="A2">Perancangan Sumber Daya Perusahaan</option>
                                    <option value="A3">Data Mining</option>
                                </select>
                            </div>
                        </div>

                        <!-- Kriteria Penilaian Table -->
                        <div class="pt-4">
                            <h2 class="text-xl font-bold text-secondary border-b pb-2 mb-4">Penilaian Kriteria (1=Sangat Rendah, 5=Sangat Tinggi)</h2>

                            <div class="overflow-x-auto rounded-lg border border-gray-200 card-shadow">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr class="table-header">
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">No</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Nama Kriteria</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Sifat</th>
                                            <th class="px-6 py-3 text-center text-xs font-semibold text-primary uppercase tracking-wider">Nilai (1-5)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <!-- Kriteria C1 -->
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">1</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">Tingkat Kesulitan (C1)</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-red-500 font-semibold">Cost</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <select name="c1" class="p-2 border border-gray-300 rounded-lg text-sm select-custom w-full max-w-[100px] mx-auto">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <!-- Kriteria C2 -->
                                        <tr class="bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">2</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">Referensi (C2)</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Benefit</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <select name="c2" class="p-2 border border-gray-300 rounded-lg text-sm select-custom w-full max-w-[100px] mx-auto">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <!-- Kriteria C3 -->
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">3</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">Lapangan Pekerjaan (C3)</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Benefit</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <select name="c3" class="p-2 border border-gray-300 rounded-lg text-sm select-custom w-full max-w-[100px] mx-auto">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <!-- Kriteria C4 -->
                                        <tr class="bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">4</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">Minat (C4)</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Benefit</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <select name="c4" class="p-2 border border-gray-300 rounded-lg text-sm select-custom w-full max-w-[100px] mx-auto">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <!-- Kriteria C5 -->
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">5</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">Bakat (C5)</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-semibold">Benefit</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <select name="c5" class="p-2 border border-gray-300 rounded-lg text-sm select-custom w-full max-w-[100px] mx-auto">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
                                                </select>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Tombol Simpan/Hitung -->
                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="submit"
                                    class="px-6 py-3 bg-primary text-white font-semibold rounded-lg hover:bg-[#5d6b59] transition duration-200 card-shadow">
                                Simpan Penilaian & Selesai
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </main>
    </div>
</body>
</html>
