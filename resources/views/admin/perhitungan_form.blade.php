<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Perhitungan - SPK TOPSIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F1F3E0;
        }
        /* Custom color pallet */
        .bg-primary { background-color: #778873; }
        .text-primary { color: #778873; }
        .bg-secondary { background-color: #A1BC98; }
        .text-secondary { color: #A1BC98; }
        .bg-dark-sidebar { background-color: #5d6b59; }
        /* Active link color for Perhitungan */
        .active-link-perhitungan { background-color: #A1BC98; color: #778873; font-weight: 600; }
        .hover\:bg-active-link:hover { background-color: #D2DCB6; }
    </style>
</head>
<body>
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar Navigation (Digunakan Mahasiswa/Admin untuk Perhitungan) -->
        <aside class="w-64 bg-dark-sidebar text-white flex-shrink-0 z-20 shadow-xl">
            <div class="p-6">
                <h1 class="text-2xl font-bold tracking-wider text-white">SPK TOPSIS</h1>
                <p class="text-sm text-gray-300 mt-1">Mahasiswa</p>
            </div>

            <nav class="p-4 space-y-2">
                <!-- Perhitungan SPK Link (ACTIVE, Fixed Link) -->
                <a href="/mahasiswa/form" class="flex items-center p-3 rounded-lg active-link-perhitungan transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calculator"><rect width="16" height="20" x="4" y="2" rx="2"/><path d="M8 6h8"/><path d="M8 10h8"/><path d="M12 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/><path d="M16 18h.01"/><path d="M8 14h.01"/><path d="M16 14h.01"/></svg>
                    <span class="ml-3">Input Penilaian</span>
                </a>

                <!-- Hasil Link (Fixed Link) -->
                <a href="/mahasiswa/hasil" class="flex items-center p-3 rounded-lg hover:bg-active-link text-white hover:text-primary transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-check"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="m9 14 2 2 4-4"/></svg>
                    <span class="ml-3">Lihat Hasil</span>
                </a>
            </nav>

            <div class="absolute bottom-4 w-full px-4">
                 <a href="/logout" class="flex items-center p-3 rounded-lg text-white hover:bg-red-600 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/>
                    </svg>
                    <span class="ml-3">Logout (Mahasiswa)</span>
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto">
            <!-- Top Bar Header -->
            <header class="bg-white shadow-md h-16 flex items-center justify-between px-6 sticky top-0 z-10">
                <h2 class="text-xl font-semibold text-primary">Input Penilaian Matakuliah Pilihan</h2>
                <div class="flex items-center space-x-3">
                    <span class="text-sm font-medium text-gray-600">NIM: 123456 (Decision Maker 1)</span>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-secondary">
                    <h1 class="text-2xl font-bold text-primary mb-6">Penilaian Individual Kriteria Matakuliah</h1>

                    <form class="space-y-8">

                        <!-- Pilihan Matakuliah -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center border-b pb-4">
                            <label for="matakuliah_pilihan" class="text-lg font-semibold text-gray-700">Pilih Matakuliah:</label>
                            <select id="matakuliah_pilihan" name="matakuliah_pilihan"
                                class="w-full p-3 border-2 border-D2DCB6 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-150">
                                <option>-- Pilih Matakuliah Pilihan --</option>
                                <option value="A1">Pengolahan Citra Digital (A1)</option>
                                <option value="A2">Perancangan Sumber Daya Perusahaan (A2)</option>
                                <option value="A3">Data Mining (A3)</option>
                            </select>
                        </div>

                        <!-- Kriteria Penilaian -->
                        <div class="space-y-6">
                            <h2 class="text-xl font-bold text-secondary border-b-2 border-D2DCB6 pb-2">Nilai Kriteria (Skala 1 - 5)</h2>

                            <!-- Kriteria C1: Tingkat Kesulitan (Cost) -->
                            <div>
                                <label for="c1" class="block text-sm font-medium text-gray-700 mb-1">C1: Tingkat Kesulitan (Cost)</label>
                                <select id="c1" name="c1" required
                                    class="w-full p-3 border-2 border-D2DCB6 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-150">
                                    <option value="">-- Beri Nilai 1-5 --</option>
                                    <option value="1">1 - Sangat Rendah</option>
                                    <option value="2">2 - Rendah</option>
                                    <option value="3">3 - Cukup Tinggi</option>
                                    <option value="4">4 - Tinggi</option>
                                    <option value="5">5 - Sangat Tinggi</option>
                                </select>
                            </div>

                            <!-- Kriteria C2: Referensi (Benefit) -->
                            <div>
                                <label for="c2" class="block text-sm font-medium text-gray-700 mb-1">C2: Referensi (Benefit)</label>
                                <select id="c2" name="c2" required
                                    class="w-full p-3 border-2 border-D2DCB6 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-150">
                                    <option value="">-- Beri Nilai 1-5 --</option>
                                    <option value="1">1 - Sangat Rendah</option>
                                    <option value="2">2 - Rendah</option>
                                    <option value="3">3 - Cukup Tinggi</option>
                                    <option value="4">4 - Tinggi</option>
                                    <option value="5">5 - Sangat Tinggi</option>
                                </select>
                            </div>

                            <!-- Kriteria C3: Lapangan Pekerjaan (Benefit) -->
                            <div>
                                <label for="c3" class="block text-sm font-medium text-gray-700 mb-1">C3: Lapangan Pekerjaan (Benefit)</label>
                                <select id="c3" name="c3" required
                                    class="w-full p-3 border-2 border-D2DCB6 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-150">
                                    <option value="">-- Beri Nilai 1-5 --</option>
                                    <option value="1">1 - Sangat Rendah</option>
                                    <option value="2">2 - Rendah</option>
                                    <option value="3">3 - Cukup Tinggi</option>
                                    <option value="4">4 - Tinggi</option>
                                    <option value="5">5 - Sangat Tinggi</option>
                                </select>
                            </div>

                        </div>

                        <!-- Tombol Simpan/Hitung -->
                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="submit"
                                    class="px-6 py-3 bg-primary text-white font-semibold rounded-lg hover:bg-primary-dark transition duration-200 shadow-lg">
                                Simpan Penilaian & Lanjutkan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </main>
    </div>
</body>
</html>
