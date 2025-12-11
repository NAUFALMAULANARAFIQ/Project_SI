<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kelompok (GDSS) - SPK TOPSIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #F1F3E0; }
        .bg-primary { background-color: #778873; }
        .text-primary { color: #778873; }
        .bg-secondary { background-color: #A1BC98; }
        .sidebar { background-color: #5d6b59; }
        .active-link { background-color: rgba(161, 188, 152, 0.3); color: #F1F3E0; font-weight: 600; }
        .card-shadow { box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05), 0 4px 6px -2px rgba(0,0,0,0.03); }
        .table-header { background-color: #D2DCB6; }
    </style>
</head>
<body>
    <div class="flex h-screen overflow-hidden">

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
                <a href="/admin/kelompok" class="flex items-center p-3 rounded-lg active-link transition duration-150 text-white">
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

        <main class="flex-1 overflow-y-auto bg-[#fdfdfd]">
        <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 sticky top-0 z-10 border-b border-gray-100">
            <h2 class="text-xl font-semibold text-primary">Hasil Keputusan Kelompok (GDSS)</h2>
            <div class="flex items-center space-x-3 text-primary">
                <span class="text-sm font-medium text-gray-600">
                    {{ Auth::user()->nama ?? Auth::user()->username }}
                </span>
            </div>
        </header>

        <div class="p-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-primary">
                    <h3 class="text-gray-500 text-sm uppercase font-bold mb-2">Pemenang Voting</h3>
                    @if($rankings->isNotEmpty())
                        <p class="text-3xl font-bold text-primary">{{ $rankings->first()->nama_mp }}</p>
                        <p class="text-sm text-gray-600">Nilai Borda: {{ number_format($rankings->first()->nilai_akhir, 6) }}</p>
                    @endif
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-secondary">
                    <h3 class="text-gray-500 text-sm uppercase font-bold mb-2">Total Partisipan</h3>
                    <p class="text-3xl font-bold text-gray-700">{{ $voters->count() }} <span class="text-lg font-normal text-gray-500">Orang</span></p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl card-shadow border-t-4 border-primary">
                <h1 class="text-2xl font-bold text-primary mb-6">2. Perhitungan Akhir Group Decision Support System (GDSS)</h1>

                <div class="overflow-x-auto border border-gray-300">
                    <table class="min-w-full divide-y divide-gray-300 border-collapse">
                        <thead class="bg-gray-100">
                            <tr>
                                <th rowspan="2" class="px-6 py-3 text-center text-sm font-bold text-black border border-gray-300 uppercase tracking-wider bg-white">
                                    Alternatif
                                </th>
                                <th colspan="{{ $totalKandidat }}" class="px-6 py-2 text-center text-sm font-bold text-black border border-gray-300 uppercase tracking-wider bg-white">
                                    Ranking
                                </th>
                                <th rowspan="2" class="px-6 py-3 text-center text-sm font-bold text-black border border-gray-300 uppercase tracking-wider bg-white">
                                    Poin Borda
                                </th>
                                <th rowspan="2" class="px-6 py-3 text-center text-sm font-bold text-black border border-gray-300 uppercase tracking-wider bg-white">
                                    Nilai Borda
                                </th>
                            </tr>
                            <tr>
                                @for($i = 1; $i <= $totalKandidat; $i++)
                                    <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700 border border-gray-300 bg-white">
                                        {{ $i }}
                                    </th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($rankings as $rank)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border border-gray-300">
                                        {{ $rank->nama_mp }}
                                    </td>

                                    @for($i = 1; $i <= $totalKandidat; $i++)
                                        <td class="px-4 py-4 whitespace-nowrap text-center text-sm text-gray-600 border border-gray-300">
                                            @if(isset($rank->detail_rank[$i]))
                                                {{ number_format($rank->detail_rank[$i], 5, ',', '.') }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                    @endfor

                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-gray-800 border border-gray-300">
                                        {{ number_format($rank->poin_borda, 5, ',', '.') }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-black border border-gray-300">
                                        {{ number_format($rank->nilai_akhir, 5, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ 3 + $totalKandidat }}" class="px-6 py-4 text-center text-gray-500">
                                        Data kosong
                                    </td>
                                </tr>
                            @endforelse

                            <tr class="bg-gray-50 font-bold">
                                <td colspan="{{ 1 + $totalKandidat }}" class="px-6 py-3 text-right text-sm text-gray-900 border border-gray-300">
                                    Total
                                </td>
                                <td class="px-6 py-3 text-center text-sm text-gray-900 border border-gray-300">
                                    {{ number_format($rankings->sum('poin_borda'), 5, ',', '.') }}
                                </td>
                                <td class="border border-gray-300"></td> </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    </div>
</body>
</html>
