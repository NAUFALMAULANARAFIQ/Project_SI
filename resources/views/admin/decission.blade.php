<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User DM - SPK TOPSIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN SweetAlert2 untuk notifikasi yang elegan -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        .table-header { background-color: #D2DCB6; }
        .hidden { display: none; }
         /* Style untuk Modal */
        .modal {
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(3px);
            z-index: 50; /* Di atas semua konten */
        }
        .modal-content {
            max-height: 90vh;
            overflow-y: auto;
        }
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

                <!-- Dashboard Link -->
                <a href="/admin/dashboard" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
                    <span class="ml-3">Dashboard</span>
                </a>

                <!-- Data Decision Maker (ACTIVE) -->
                <a href="/admin/decission" class="flex items-center p-3 rounded-lg active-link transition duration-150 text-white">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <span class="ml-3">Data Decision Maker</span>
                </a>

                <!-- Data Alternatif -->
                <a href="/admin/alternatif" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    <span class="ml-3">Data Alternatif</span>
                </a>

                <!-- Data Kriteria -->
                <a href="/admin/kriteria" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Z"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                    <span class="ml-3">Data Kriteria</span>
                </a>

                <!-- Form Penilaian -->
                <a href="/admin/penilaian" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M12 18V10"/></svg>
                    <span class="ml-3">Form Penilaian</span>
                </a>

                <!-- Hasil Individu -->
                <a href="/admin/individu" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/><polyline points="10 8 14 12 10 16"/></svg>
                    <span class="ml-3">Hasil Individu</span>
                </a>

                <!-- Hasil Kelompok -->
                <a href="/admin/kelompok" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 19c0 1.1-.9 2-2 2H9c-1.1 0-2-.9-2-2V5c0-1.1.9-2 2-2h6c1.1 0 2 .9 2 2v14z"/><path d="M7 10h10"/><path d="M7 14h10"/></svg>
                    <span class="ml-3">Hasil Kelompok</span>
                </a>

                <!-- Laporan -->
                <a href="/dm/laporan" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="14" y="2" width="6" height="6" rx="1"/><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M10 17h4"/></svg>
                    <span class="ml-3">Laporan</span>
                </a>

                <div class="pt-4 mt-2 border-t border-gray-600/50">
                     <!-- Profil Saya -->
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                        <svg xmlns="http://www.w3.org/2300/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        <span class="ml-3">Profil Saya</span>
                    </a>

                    <!-- Logout -->
                    <a href="/logout" class="flex items-center p-3 rounded-lg text-red-300 hover:bg-red-600/50 transition duration-150">
                        <svg xmlns="http://www.w3.org/2300/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
                        <span class="ml-3">Logout</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto bg-[#fdfdfd]">
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 sticky top-0 z-10 border-b border-gray-100">
                <h2 class="text-xl font-semibold text-primary">Data User (Decision Maker)</h2>
                <div class="flex items-center space-x-3 text-primary">
                    <span class="text-sm font-medium text-gray-600">Admin</span>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                <div class="bg-white p-6 rounded-xl shadow-lg card-shadow border-t-4 border-secondary">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-primary">Kelola Akun Decision Maker (Kaprodi & Dosen)</h2>
                        <!-- Tombol yang memicu modal tambah user -->
                        <button id="add-user-btn" class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-[#5d6b59] transition duration-150 shadow-md">
                            + Tambah User DM
                        </button>
                    </div>

                    <!-- Keterangan Penting GDSS -->
                    <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-lg">
                        <p class="text-sm text-blue-700 font-semibold">
                            Sistem membutuhkan **minimal 3 Decision Maker** (Kaprodi dan Dosen) dan akan memberikan bobot lebih tinggi pada penilaian DM dengan **Jabatan Tertinggi** (Kaprodi).
                        </p>
                    </div>

                    <!-- User DM Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 card-shadow">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="table-header">
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Username</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">NIDN/ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Jabatan (Role DM)</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">E-mail</th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold text-primary uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <!-- ID tbody diubah menjadi dm-table-body agar bisa di-render secara dinamis -->
                            <tbody id="dm-table-body" class="bg-white divide-y divide-gray-200">
                                <!-- Data akan diisi oleh JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
<div id="add-user-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
    <div class="modal-content bg-white w-full max-w-lg rounded-xl shadow-2xl p-6 transform transition-all duration-300">
        <div class="flex justify-between items-center border-b pb-3 mb-4">
            <h3 class="text-xl font-bold text-primary">Tambah Akun Decision Maker</h3>
            <button id="close-add-modal-btn" class="text-gray-400 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2300/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>

        <form id="add-form" class="space-y-4" method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div>
                <label for="add-dm-id-input" class="block text-sm font-medium text-gray-700 mb-1">NIDN / ID Pegawai:</label>
                <input type="text" id="add-dm-id-input" name="id_user_input" placeholder="Masukkan NIDN"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
            </div>

            <div>
                <label for="add-dm-username-input" class="block text-sm font-medium text-gray-700 mb-1">Username:</label>
                <input type="text" id="add-dm-username-input" name="username" placeholder="Username untuk login" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
            </div>

            <div>
                <label for="add-dm-email-input" class="block text-sm font-medium text-gray-700 mb-1">E-mail:</label>
                <input type="email" id="add-dm-email-input" name="email" placeholder="contoh@unri.ac.id" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
            </div>

            <div>
                <label for="add-dm-jabatan-select" class="block text-sm font-medium text-gray-700 mb-1">Jabatan (Role):</label>
                <select id="add-dm-jabatan-select" name="level_user" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                    <option value="anggota">Dosen (Anggota)</option>
                    <option value="ketua">Kaprodi (Ketua)</option>
                </select>
            </div>

            <div>
                <label for="add-dm-password-input" class="block text-sm font-medium text-gray-700 mb-1">Password:</label>
                <input type="password" id="add-dm-password-input" name="password" placeholder="Minimal 6 karakter" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" id="cancel-add-modal-btn" class="px-4 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400">Batal</button>
                <button type="submit" class="px-4 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-[#5d6b59]">Simpan User</button>
            </div>
        </form>
    </div>
</div>

<div id="edit-user-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
    <div class="modal-content bg-white w-full max-w-lg rounded-xl shadow-2xl p-6 transform transition-all duration-300">
        <div class="flex justify-between items-center border-b pb-3 mb-4">
            <h3 class="text-xl font-bold text-primary" id="edit-modal-title">Edit Akun</h3>
            <button id="close-edit-modal-btn" class="text-gray-400 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2300/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>

        <form id="edit-form" class="space-y-4" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit-original-id" name="original_id">

            <div>
                <label for="edit-dm-id-input" class="block text-sm font-medium text-gray-700 mb-1">NIDN / ID Pegawai:</label>
                <input type="text" id="edit-dm-id-input" name="id_user_input" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
            </div>

            <div>
                <label for="edit-dm-username-input" class="block text-sm font-medium text-gray-700 mb-1">Username:</label>
                <input type="text" id="edit-dm-username-input" name="username" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
            </div>

            <div>
                <label for="edit-dm-email-input" class="block text-sm font-medium text-gray-700 mb-1">E-mail:</label>
                <input type="email" id="edit-dm-email-input" name="email" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
            </div>

            <div>
                <label for="edit-dm-jabatan-select" class="block text-sm font-medium text-gray-700 mb-1">Jabatan (Role):</label>
                <select id="edit-dm-jabatan-select" name="level_user" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                    <option value="anggota">Dosen (Anggota)</option>
                    <option value="ketua">Kaprodi (Ketua)</option>
                </select>
            </div>

            <div>
                <label for="edit-dm-password-input" class="block text-sm font-medium text-gray-700 mb-1">Password Baru (Opsional):</label>
                <input type="password" id="edit-dm-password-input" name="password" placeholder="Kosongkan jika tidak diubah"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" id="cancel-edit-modal-btn" class="px-4 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

    <!-- MODAL 1.5: EDIT USER DM -->
    <div id="edit-user-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
        <div class="modal-content bg-white w-full max-w-lg rounded-xl shadow-2xl p-6 transform transition-all duration-300">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 class="text-xl font-bold text-primary" id="edit-modal-title">Edit Akun Decision Maker</h3>
                <button id="close-edit-modal-btn" class="text-gray-400 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>

            <form id="edit-form" class="space-y-4" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit-original-id" name="original_id">
                <!-- Field NIDN/ID -->
                <div>
                    <label for="edit-dm-id-input" class="block text-sm font-medium text-gray-700 mb-1">NIDN/ID (ID Pegawai/Dosen):</label>
                    <input type="text" id="edit-dm-id-input" name="id_user_input" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>
                <!-- Field Username -->
                <div>
                    <label for="edit-dm-username-input" class="block text-sm font-medium text-gray-700 mb-1">Username Login:</label>
                    <input type="text" id="edit-dm-username-input" name="username" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>
                <!-- Field Nama Lengkap -->
                <div>
                    <label for="edit-dm-nama-input" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap:</label>
                    <input type="text" id="edit-dm-nama-input" name="name" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>
                <!-- Field Email -->
                <div>
                    <label for="edit-dm-email-input" class="block text-sm font-medium text-gray-700 mb-1">E-mail:</label>
                    <input type="email" id="edit-dm-email-input" name="email" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>
                <!-- Field Jabatan -->
                <div>
                    <label for="edit-dm-jabatan-select" class="block text-sm font-medium text-gray-700 mb-1">Jabatan (Role DM):</label>
                    <select id="edit-dm-jabatan-select" name="level_user" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                        <option value="anggota">Dosen (Anggota)</option>
                        <option value="ketua">Kaprodi (Ketua)</option>
                    </select>
                </div>
                <!-- Field Password (Opsional) -->
                <div>
                    <label for="edit-dm-password-input" class="block text-sm font-medium text-gray-700 mb-1">Password Baru (Kosongkan jika tidak diubah):</label>
                    <input type="password" id="edit-dm-password-input" name="password" placeholder="Minimal 6 karakter"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" id="cancel-edit-modal-btn"
                        class="px-4 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400 transition duration-150">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-150">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- MODAL 2: KONFIRMASI HAPUS -->
    <div id="delete-confirmation-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
        <div class="modal-content bg-white w-full max-w-sm rounded-xl shadow-2xl p-6 transform transition-all duration-300 text-center">
            <svg class="mx-auto h-16 w-16 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <h3 class="mt-4 text-xl font-bold text-gray-800" id="delete-title">Anda Yakin?</h3>
            <p class="mt-2 text-sm text-gray-600" id="delete-text">
                Anda tidak akan dapat mengembalikan data DM **<span id="dm-name-placeholder" class="font-semibold text-red-600"></span>** setelah dihapus!
            </p>
            <div class="mt-6 flex justify-center space-x-4">
                <button type="button" id="delete-confirm-btn"
                    class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition duration-150 shadow-md">
                    Ya, Hapus!
                </button>
                <button type="button" id="delete-cancel-btn"
                    class="px-4 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400 transition duration-150">
                    Batal
                </button>
            </div>
        </div>
    </div>

  <script>
    // --- DATA MANAGEMENT (SERVER-SIDE) ---
    // Pastikan controller mengirim variabel $users
    let decisionMakers = @json($users ?? []);

    // --- ELEMEN DOM ---
    const dmTableBody = document.getElementById('dm-table-body');
    const addUserModal = document.getElementById('add-user-modal');
    const editUserModal = document.getElementById('edit-user-modal');
    const deleteModal = document.getElementById('delete-confirmation-modal');

    const addForm = document.getElementById('add-form');
    const editForm = document.getElementById('edit-form');

    const dmNamePlaceholder = document.getElementById('dm-name-placeholder');

    // Elemen Modal Edit
    const editModalTitle = document.getElementById('edit-modal-title');
    const editOriginalId = document.getElementById('edit-original-id'); // Hidden input untuk ID Database
    const editDmIdInput = document.getElementById('edit-dm-id-input'); // Input NIDN/ID Tampilan
    const editDmUsernameInput = document.getElementById('edit-dm-username-input');
    const editDmNamaInput = document.getElementById('edit-dm-nama-input');
    const editDmEmailInput = document.getElementById('edit-dm-email-input');
    const editDmJabatanSelect = document.getElementById('edit-dm-jabatan-select');
    const editDmPasswordInput = document.getElementById('edit-dm-password-input');

    let currentDMId = null;

    // Fungsi untuk menyembunyikan semua modal
    const hideAllModals = () => {
        addUserModal.classList.add('hidden');
        editUserModal.classList.add('hidden');
        deleteModal.classList.add('hidden');
    };

    // --- CORE FUNCTION: RENDER DATA KE TABEL ---
    function renderTable() {
        dmTableBody.innerHTML = '';

        if (decisionMakers.length === 0) {
            dmTableBody.innerHTML = `<tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data Decision Maker</td></tr>`;
            return;
        }

        decisionMakers.forEach((dm, index) => {
            // Normalisasi data (mengantisipasi perbedaan nama kolom di database)
            // Primary Key (untuk route update/delete)
            const pkId = dm.id || dm.id_user;

            // Data Tampilan
            const nidn = dm.nidn || dm.id_user || dm.nomor_induk || '-'; // Sesuaikan dengan kolom NIDN di DB Anda
            const username = dm.username || '-';
            const fullName = dm.name || dm.nama_lengkap || '-';
            const jabatan = dm.level_user || dm.jabatan || dm.role || 'anggota';
            const email = dm.email || '-';

            // Cek apakah Kaprodi/Ketua
            const isKaprodi = (String(jabatan).toLowerCase().includes('ketua') || String(jabatan).toLowerCase().includes('kaprodi'));

            const row = `
                <tr class="${index % 2 === 1 ? 'bg-gray-50' : 'bg-white'} hover:bg-gray-100 transition duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${index + 1}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">${username}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">${nidn}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm ${isKaprodi ? 'font-bold text-red-600' : 'text-secondary font-semibold'} capitalize">
                        ${jabatan === 'ketua' ? 'Kaprodi (Ketua)' : 'Dosen (Anggota)'}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${email}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                        <button onclick="openEditModal('${pkId}')" class="text-blue-500 hover:text-blue-700 p-1 rounded-full transition duration-150" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                        </button>
                        <button onclick="showDeleteConfirmation('${pkId}', '${fullName}')" class="text-red-500 hover:text-red-700 p-1 rounded-full transition duration-150" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                        </button>
                    </td>
                </tr>
            `;
            dmTableBody.insertAdjacentHTML('beforeend', row);
        });
    }

    // --- CRUD LOGIC FUNCTIONS ---

    // 1. CREATE
    addForm.addEventListener('submit', function(e) {
        // Biarkan form submit secara native ke Laravel
        const submitBtn = addForm.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.innerHTML = 'Menyimpan...';
            submitBtn.disabled = true;
        }
    });

    // 2. READ / EDIT FORM FILLING (PERBAIKAN UTAMA DISINI)
    // Kita mencari data user berdasarkan ID dari array decisionMakers
    function openEditModal(pkId) {
        hideAllModals();

        // Cari object user di array data
        // Menggunakan loose equality (==) untuk mengantisipasi perbedaan tipe data (string vs number)
        const user = decisionMakers.find(u => (u.id == pkId || u.id_user == pkId));

        if (!user) {
            console.error("User tidak ditemukan dengan ID:", pkId);
            return; // Hentikan jika data tidak ketemu
        }

        // Ambil data detail dari object
        const nidn = user.nidn || user.id_user || '';
        const username = user.username || '';
        const fullName = user.name || user.nama_lengkap || '';
        const email = user.email || '';
        const jabatan = user.level_user || user.role || 'anggota';

        // Mengisi judul modal
        editModalTitle.textContent = `Edit Akun: ${fullName}`;

        // Mengisi Value Input Form
        editOriginalId.value = pkId; // ID database (hidden)

        editDmIdInput.value = nidn; // NIDN untuk diedit
        editDmUsernameInput.value = username;
        editDmNamaInput.value = fullName;
        editDmEmailInput.value = email;

        // Reset Password Field (selalu kosong saat buka edit)
        editDmPasswordInput.value = '';

        // Atur Select Option Jabatan
        if (String(jabatan).toLowerCase().includes('ketua') || String(jabatan).toLowerCase().includes('kaprodi')) {
            editDmJabatanSelect.value = 'ketua';
        } else {
            editDmJabatanSelect.value = 'anggota';
        }

        // Update Action URL Form agar mengarah ke route update yang benar
        // Pastikan route di Laravel: Route::put('/admin/users/{id}', ...)
        editForm.action = `/admin/users/${pkId}`;

        // Tampilkan Modal
        editUserModal.classList.remove('hidden');
    }

    // 3. UPDATE
    editForm.addEventListener('submit', function(e) {
        const submitBtn = editForm.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.innerHTML = 'Menyimpan...';
            submitBtn.disabled = true;
        }
    });

    // 4. DELETE (Konfirmasi)
    function showDeleteConfirmation(dmId, dmName) {
        currentDMId = dmId;
        hideAllModals();

        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: "Anda Yakin?",
                text: `Anda akan menghapus user ${dmName}? Data tidak dapat dikembalikan.`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF4444",
                cancelButtonColor: "#6B7280",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    submitDelete(currentDMId);
                }
            });
        } else {
            // Fallback ke Modal Bawaan
            dmNamePlaceholder.textContent = dmName;
            deleteModal.classList.remove('hidden');
        }
    }

    // 5. DELETE (Eksekusi)
    function submitDelete(userId) {
        const deleteForm = document.getElementById('hidden-delete-form');
        if (!deleteForm) return;

        deleteForm.action = `/admin/users/${userId}`;
        deleteForm.querySelector('button[type="submit"]').click();
    }


    // --- EVENT LISTENERS & INITIALIZATION ---
    document.addEventListener('DOMContentLoaded', function() {
        renderTable();

        // Tambah User Btn
        document.getElementById('add-user-btn').addEventListener('click', () => {
            hideAllModals();
            addForm.reset();
            addUserModal.classList.remove('hidden');
        });

        // Tombol Close/Batal
        const closeButtons = document.querySelectorAll('#close-add-modal-btn, #cancel-add-modal-btn, #close-edit-modal-btn, #cancel-edit-modal-btn, #delete-cancel-btn');
        closeButtons.forEach(btn => btn.addEventListener('click', hideAllModals));

        // Close on Click Outside
        [addUserModal, editUserModal, deleteModal].forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) hideAllModals();
            });
        });

        // Tombol Confirm Delete (Modal Manual)
        document.getElementById('delete-confirm-btn').addEventListener('click', () => {
            submitDelete(currentDMId);
        });

        // Expose functions to global window object
        window.showDeleteConfirmation = showDeleteConfirmation;
        window.openEditModal = openEditModal;
    });
</script>
