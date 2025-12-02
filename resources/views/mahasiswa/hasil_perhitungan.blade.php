<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan SPK - SPK TOPSIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #F1F3E0; }
        .bg-primary { background-color: #778873; }
        .text-primary { color: #778873; }
        .bg-secondary { background-color: #A1BC98; }
        .text-secondary { color: #A1BC98; }
        .bg-dark-sidebar { background-color: #5d6b59; }
        /* Active link color for Hasil */
        .active-link-hasil { background-color: #A1BC98; color: #778873; font-weight: 600; }
        .hover\:bg-active-link:hover { background-color: #D2DCB6; }
        .table-header { background-color: #D2DCB6; }
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
                <!-- Perhitungan SPK Link (Fixed Link) -->
                <a href="/mahasiswa/form" class="flex items-center p-3 rounded-lg hover:bg-active-link text-white hover:text-primary transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calculator"><rect width="16" height="20" x="4" y="2" rx="2"/><path d="M8 6h8"/><path d="M8 10h8"/><path d="M12 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/><path d="M16 18h.01"/><path d="M8 14h.01"/><path d="M16 14h.01"/></svg>
                    <span class="ml-3">Input Penilaian</span>
                </a>

                <!-- Hasil Link (ACTIVE, Fixed Link) -->
                <a href="/mahasisaw/hasil" class="flex items-center p-3 rounded-lg active-link-hasil transition duration-150">
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
            <header class="bg-white shadow-md h-16 flex items-center justify-between px-6 sticky top-0 z-10">
                <h2 class="text-xl font-semibold text-primary">Hasil Perhitungan SPK (Metode Borda)</h2>
                <div class="flex items-center space-x-3">
                    <span class="text-sm font-medium text-gray-600">NIM: 123456</span>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-primary">
                    <h1 class="text-2xl font-bold text-primary mb-6">Rekomendasi Matakuliah Pilihan</h1>
                    <p class="mb-6 text-gray-600">Hasil ini adalah konsensus dari 3 Decision Maker (Pengambil Keputusan) menggunakan Metode TOPSIS dan penggabungan dengan Metode Borda.</p>

                    <!-- Ringkasan Hasil -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-D2DCB6 p-4 rounded-lg shadow-md">
                            <p class="text-sm font-semibold text-gray-700">Keputusan Kelompok</p>
                            <p class="text-xl font-bold text-primary">Semester IV</p>
                        </div>
                        <div class="bg-D2DCB6 p-4 rounded-lg shadow-md">
                            <p class="text-sm font-semibold text-gray-700">Total Decision Maker</p>
                            <p class="text-xl font-bold text-primary">3 Mahasiswa</p>
                        </div>
                        <div class="bg-D2DCB6 p-4 rounded-lg shadow-md">
                            <p class="text-sm font-semibold text-gray-700">Tanggal Perhitungan</p>
                            <p class="text-xl font-bold text-primary">27/11/2025</p>
                        </div>
                    </div>

                    <h2 class="text-xl font-bold text-secondary border-b-2 border-D2DCB6 pb-2 mb-4">Peringkat Akhir Rekomendasi</h2>

                    <!-- Ranking Table -->
                    <div class="overflow-x-auto rounded-lg border border-D2DCB6">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="table-header">
                                    <th class="px-6 py-3 text-center text-xs font-semibold text-primary uppercase tracking-wider">Peringkat</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Matakuliah</th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold text-primary uppercase tracking-wider">Nilai Preferensi (Vi)</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if(!empty($hasilAkhir) && $hasilAkhir->count() > 0)
                                    @foreach($hasilAkhir as $index => $row)
                                        <tr class="{{ $index == 0 ? 'bg-green-100/50' : ($index % 2 ? '' : 'bg-gray-50') }}">
                                            <td class="px-6 py-4 whitespace-nowrap text-center {{ $index==0? 'text-2xl font-extrabold text-primary':'text-lg' }}">#{{ $index + 1 }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-lg font-{{ $index==0? 'bold text-primary' : 'medium text-gray-800' }}">{{ $row->mkPlhn->nama_mp ?? ($row->id_mp ?? 'Unknown') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-800">{{ number_format($row->hasil ?? 0, 5) }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada data perhitungan.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
