<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kriteria - SPK TOPSIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #F1F3E0; }
        .bg-primary { background-color: #778873; }
        .text-primary { color: #778873; }
        .bg-secondary { background-color: #A1BC98; }
        .sidebar { background-color: #5d6b59; }
        .active-link { background-color: rgba(161, 188, 152, 0.3); color: #F1F3E0; font-weight: 600; }
        .card-bg { background-color: #ffffff; border-top: 4px solid #A1BC98; }
        .card-shadow { box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05), 0 4px 6px -2px rgba(0,0,0,0.03); }
        .table-header { background-color: #D2DCB6; }
        .hidden { display: none; }
        .modal { background-color: rgba(0, 0, 0, 0.6); backdrop-filter: blur(3px); z-index: 50; }
        .modal-content { max-height: 90vh; overflow-y: auto; }
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
                <a href="/dm/kriteria" class="flex items-center p-3 rounded-lg active-link transition duration-150 text-white">
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
        <main class="flex-1 overflow-y-auto bg-[#fdfdfd]">
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 sticky top-0 z-10 border-b border-gray-100">
                <h2 class="text-xl font-semibold text-primary">Data Kriteria & Bobot</h2>
                <div class="flex items-center space-x-3 text-primary">
                    <span class="text-sm font-medium text-gray-600">
                        {{ Auth::user()->nama ?? Auth::user()->username }}
                        ({{ Auth::user()->level_user == 'ketua' ? 'Kaprodi' : 'Dosen' }})
                    </span>
                </div>
            </header>

            <div class="p-8">
                @if(session('success'))
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({ title: "Berhasil!", text: "{{ session('success') }}", icon: "success", confirmButtonColor: "#778873" });
                    });
                </script>
                @endif

                @if($errors->any())
                <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                    <strong>Ups! Ada kesalahan input:</strong>
                    <ul class="list-disc ml-5 mt-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="bg-white p-6 rounded-xl shadow-lg card-shadow border-t-4 border-secondary">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-primary">Kelola Kriteria & Bobot (C)</h2>
                        @if(Auth::user()->level_user == 'ketua')
                        <button onclick="toggleModal('add-kriteria-modal')" class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-[#5d6b59] transition duration-150 shadow-md">
                            + Tambah Kriteria
                        </button>
                        @endif
                    </div>

                    <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 mb-6 rounded-lg">
                        <p class="text-sm text-yellow-700 font-semibold">
                            Pastikan total Bobot ($\Sigma W$) memiliki nilai yang sesuai dengan metode perhitungan Anda.
                        </p>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-gray-200 card-shadow">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="table-header">
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase">Kode</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase">Nama Kriteria</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase">Sifat</th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold text-primary uppercase">Bobot (W)</th>
                                    @if(Auth::user()->level_user == 'ketua')
                                    <th class="px-6 py-3 text-center text-xs font-semibold text-primary uppercase">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($kriteria as $index => $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $item->id_kriteria }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $item->nama_kriteria }}</td>
                                    <td class="px-6 py-4 text-sm font-semibold {{ $item->sifat == 'Cost' ? 'text-red-500' : 'text-green-600' }}">
                                        {{ $item->sifat }}
                                    </td>
                                    <td class="px-6 py-4 text-center text-sm font-bold text-primary">{{ $item->bobot }}</td>
                                    @if(Auth::user()->level_user == 'ketua')
                                    <td class="px-6 py-4 text-center text-sm font-medium space-x-2">
                                        <button onclick="openEditModal('{{ $item->id_kriteria ?? $item->id }}', '{{ $item->id_kriteria }}', '{{ $item->nama_kriteria }}', '{{ $item->cost_benefit }}', '{{ $item->bobot }}')"
                                            class="text-blue-500 hover:text-blue-700 p-1 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                                        </button>
                                        <button onclick="openDeleteModal('{{ $item->id_kriteria ?? $item->id }}', '{{ $item->nama_kriteria }}')"
                                            class="text-red-500 hover:text-red-700 p-1 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                        </button>
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data kriteria.</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot class="bg-gray-100">
                                <tr>
                                    <td colspan="4" class="px-6 py-3 text-right text-sm font-bold text-primary">Total Bobot:</td>
                                    <td class="px-6 py-3 text-center text-sm font-bold {{ $totalBobot != 100 && $totalBobot != 1 ? 'text-red-500' : 'text-green-600' }}">
                                        {{ $totalBobot }}
                                    </td>
                                    <td class="px-6 py-3"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="add-kriteria-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
        <div class="modal-content bg-white w-full max-w-lg rounded-xl shadow-2xl p-6">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 class="text-xl font-bold text-primary">Tambah Kriteria Baru</h3>
                <button onclick="toggleModal('add-kriteria-modal')" class="text-gray-400 hover:text-gray-700">X</button>
            </div>
            <form action="{{ route('admin.kriteria.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kode Kriteria (C1, C2...):</label>
                    <input type="text" name="kode" placeholder="Contoh: C4" required class="w-full p-3 border border-gray-300 rounded-lg uppercase">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kriteria:</label>
                    <input type="text" name="nama" placeholder="Contoh: Biaya" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cost-Benefit:</label>
                    <select name="cost_benefit" required class="w-full p-3 border border-gray-300 rounded-lg">
                        <option value="" disabled selected>Pilih Cost/Benefit</option>
                        <option value="Benefit">Benefit (Nilai terbaik adalah terbesar)</option>
                        <option value="Cost">Cost (Nilai terbaik adalah terkecil)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Bobot Preferensi (W):</label>
                    <input type="number" name="bobot" placeholder="Angka 1-5" step="0.01" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="toggleModal('add-kriteria-modal')" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="edit-kriteria-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
        <div class="modal-content bg-white w-full max-w-lg rounded-xl shadow-2xl p-6">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 class="text-xl font-bold text-primary">Edit Kriteria</h3>
                <button onclick="toggleModal('edit-kriteria-modal')" class="text-gray-400 hover:text-gray-700">X</button>
            </div>
            <form id="form-edit" action="" method="POST" class="space-y-4">
                @csrf
                @method('PUT') <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kode Kriteria:</label>
                    <input type="text" id="edit_kode" name="kode" required class="w-full p-3 border border-gray-300 rounded-lg uppercase">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kriteria:</label>
                    <input type="text" id="edit_nama" name="nama" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cost-Benefit:</label>
                    <select id="edit_cost_benefit" name="cost_benefit" required class="w-full p-3 border border-gray-300 rounded-lg">
                        <option value="Benefit">Benefit</option>
                        <option value="Cost">Cost</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Bobot Preferensi (W):</label>
                    <input type="number" id="edit_bobot" name="bobot" step="0.01" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="toggleModal('edit-kriteria-modal')" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
                </div>
            </form>
        </div>
    </div>

    <div id="delete-confirmation-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
        <div class="modal-content bg-white w-full max-w-sm rounded-xl shadow-2xl p-6 transform transition-all duration-300 text-center">
            <svg class="mx-auto h-16 w-16 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <h3 class="mt-4 text-xl font-bold text-gray-800">Anda Yakin?</h3>
            <p class="mt-2 text-sm text-gray-600">
                Hapus Kriteria <span id="del_name_placeholder" class="font-bold text-red-600"></span>?
            </p>
            <form id="form-delete" action="" method="POST" class="mt-6 flex justify-center space-x-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md">Ya, Hapus!</button>
                <button type="button" onclick="toggleModal('delete-confirmation-modal')" class="px-4 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg">Batal</button>
            </form>
        </div>
    </div>

    <script>
        // 1. Fungsi Buka/Tutup Modal (UI)
        function toggleModal(modalID) {
            const modal = document.getElementById(modalID);
            if(modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
            } else {
                modal.classList.add('hidden');
            }
        }

        // 2. Fungsi Mengisi Form Edit (UI Only)
        // Memindahkan data dari tombol ke Form Modal
        function openEditModal(id, kode, nama, cost_benefit, bobot) {
            document.getElementById('edit_kode').value = kode;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_cost_benefit').value = cost_benefit;
            document.getElementById('edit_bobot').value = bobot;

            // Update Action URL Form secara dinamis
            // Menjadi: /admin/kriteria/{id}
            document.getElementById('form-edit').action = "{{ route('admin.kriteria.index') }}/" + id;

            toggleModal('edit-kriteria-modal');
        }

        // 3. Fungsi Menyiapkan Form Hapus (UI Only)
        function openDeleteModal(id, nama) {
            document.getElementById('del_name_placeholder').textContent = nama;

            // Update Action URL Form secara dinamis
            document.getElementById('form-delete').action = "{{ route('admin.kriteria.index') }}/" + id;

            toggleModal('delete-confirmation-modal');
        }
    </script>
</body>
</html>
