<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User DM - SPK TOPSIS</title>
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
                <a href="/admin/decission" class="flex items-center p-3 rounded-lg active-link transition duration-150 text-white">
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
                <h2 class="text-xl font-semibold text-primary">Data User (Decision Maker)</h2>
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
                    <strong>Periksa Inputan Anda:</strong>
                    <ul class="list-disc ml-5 mt-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="bg-white p-6 rounded-xl shadow-lg card-shadow border-t-4 border-secondary">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-primary">Kelola Akun Decision Maker</h2>
                        @if(Auth::user()->level_user == 'ketua')
                        <button onclick="toggleModal('add-user-modal')" class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-[#5d6b59] transition duration-150 shadow-md">
                            + Tambah User DM
                        </button>
                        @endif
                    </div>

                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-lg">
                        <p class="text-sm text-blue-700 font-semibold">
                            Sistem membutuhkan **minimal 3 Decision Maker**. Kaprodi memiliki bobot preferensi lebih tinggi.
                        </p>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-gray-200 card-shadow">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="table-header">
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase">Username</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase">ID User</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase">Jabatan</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase">E-mail</th>
                                    @if(Auth::user()->level_user == 'ketua')
                                    <th class="px-6 py-3 text-center text-xs font-semibold text-primary uppercase">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($users as $index => $user)
                                @php
                                    $isKaprodi = $user->level_user == 'ketua';
                                    $jabatanDisplay = $isKaprodi ? 'Kaprodi' : 'Dosen';
                                @endphp
                                <tr class="{{ $index % 2 == 1 ? 'bg-gray-50' : 'bg-white' }}">
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $user->username }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $user->id_user }}</td>
                                    <td class="px-6 py-4 text-sm {{ $isKaprodi ? 'font-bold text-red-600' : 'text-secondary font-semibold' }}">
                                        {{ $jabatanDisplay }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                                    @if(Auth::user()->level_user == 'ketua')
                                    <td class="px-6 py-4 text-center text-sm font-medium space-x-2">
                                        <button onclick="openEditModal(
                                            '{{ $user->id_user }}',
                                            '{{ $user->username }}',
                                            '{{ $user->nama ?? $user->username }}',
                                            '{{ $user->email }}',
                                            '{{ $jabatanDisplay }}'
                                        )" class="text-blue-500 hover:text-blue-700 p-1 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                                        </button>
                                        <button onclick="openDeleteModal('{{ $user->id_user }}', '{{ $user->username }}')" class="text-red-500 hover:text-red-700 p-1 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                        </button>
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data user.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8 bg-white p-6 rounded-xl shadow-lg card-shadow border-t-4 border-primary">
                        <h3 class="text-xl font-bold text-primary mb-4">Ranking Matakuliah (Berdasarkan Perhitungan)</h3>
                        <div class="overflow-x-auto rounded-lg border border-D2DCB6">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr class="table-header">
                                        <th class="px-6 py-3">Peringkat</th>
                                        <th class="px-6 py-3">Matakuliah</th>
                                        <th class="px-6 py-3 text-center">Rata-rata Nilai (Vi)</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @forelse($rankings as $idx => $rank)
                                    <tr class="{{ $idx == 0 ? 'bg-green-100/50' : ($idx % 2 == 1 ? 'bg-gray-50' : '') }}">
                                        <td class="px-6 py-4 text-center font-bold">#{{ $idx + 1 }}</td>
                                        <td class="px-6 py-4">{{ $rank->nama_mp }} <span class="text-xs text-gray-500">({{ $rank->kode_mp }})</span></td>
                                        <td class="px-6 py-4 text-center font-semibold text-primary">{{ number_format($rank->nilai_rata, 5) }}</td>
                                    </tr>
                                    @empty
                                    <tr><td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada data perhitungan.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="add-user-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
        <div class="modal-content bg-white w-full max-w-lg rounded-xl shadow-2xl p-6">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 class="text-xl font-bold text-primary">Tambah User DM</h3>
                <button onclick="toggleModal('add-user-modal')" class="text-gray-400 hover:text-gray-700">X</button>
            </div>
            <form action="{{ route('admin.decission.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Username Login:</label>
                    <input type="text" name="dm_username" placeholder="Username" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                {{-- <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap:</label>
                    <input type="text" name="dm_nama" placeholder="Nama Lengkap" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div> --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">E-mail:</label>
                    <input type="email" name="dm_email" placeholder="contoh@unri.ac.id" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan:</label>
                    <select name="dm_jabatan" required class="w-full p-3 border border-gray-300 rounded-lg">
                        <option value="Dosen">Dosen</option>
                        <option value="Kaprodi">Kaprodi (Bobot Tinggi)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password:</label>
                    <input type="password" name="dm_password" placeholder="Min 6 karakter" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="toggleModal('add-user-modal')" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div id="edit-user-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
        <div class="modal-content bg-white w-full max-w-lg rounded-xl shadow-2xl p-6">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 class="text-xl font-bold text-primary">Edit User DM</h3>
                <button onclick="toggleModal('edit-user-modal')" class="text-gray-400 hover:text-gray-700">X</button>
            </div>
            <form id="edit-form" action="" method="POST" class="space-y-4">
                @csrf
                @method('PUT') <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">ID User:</label>
                    <input type="text" id="edit_dm_id" disabled class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Username:</label>
                    <input type="text" id="edit_dm_username" name="dm_username" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">E-mail:</label>
                    <input type="email" id="edit_dm_email" name="dm_email" required class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan:</label>
                    <select id="edit_dm_jabatan" name="dm_jabatan" required class="w-full p-3 border border-gray-300 rounded-lg">
                        <option value="Dosen">Dosen</option>
                        <option value="Kaprodi">Kaprodi</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru (Opsional):</label>
                    <input type="password" name="dm_password" placeholder="Isi jika ingin mengganti" class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="toggleModal('edit-user-modal')" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
                </div>
            </form>
        </div>
    </div>

    <div id="delete-confirmation-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
        <div class="modal-content bg-white w-full max-w-sm rounded-xl shadow-2xl p-6 text-center">
            <svg class="mx-auto h-16 w-16 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <h3 class="mt-4 text-xl font-bold text-gray-800">Anda Yakin?</h3>
            <p class="mt-2 text-sm text-gray-600">
                Hapus User <span id="del_name_placeholder" class="font-bold text-red-600"></span>?
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
        function toggleModal(modalID) {
            const modal = document.getElementById(modalID);
            modal.classList.toggle('hidden');
        }

        function openEditModal(id, username, nama, email, jabatan) {
            document.getElementById('edit_dm_id').value = id;
            document.getElementById('edit_dm_username').value = username;
            document.getElementById('edit_dm_email').value = email;
            document.getElementById('edit_dm_jabatan').value = jabatan;

            // Set Action URL ke: /admin/decission/{id}
            document.getElementById('edit-form').action = "{{ route('admin.decission.index') }}/" + id;

            toggleModal('edit-user-modal');
        }

        function openDeleteModal(id, name) {
            document.getElementById('del_name_placeholder').textContent = name;

            // Set Action URL ke: /admin/decission/{id}
            document.getElementById('form-delete').action = "{{ route('admin.decission.index') }}/" + id;

            toggleModal('delete-confirmation-modal');
        }
    </script>
</body>
</html>
