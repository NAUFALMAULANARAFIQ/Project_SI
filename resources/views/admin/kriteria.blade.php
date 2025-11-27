<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kriteria - SPK TOPSIS</title>
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

                <!-- Data Decision Maker -->
                <a href="/admin/decission" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <span class="ml-3">Data Decision Maker</span>
                </a>

                <!-- Data Alternatif -->
                <a href="/admin/alternatif" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                    <span class="ml-3">Data Alternatif</span>
                </a>

                <!-- Data Kriteria (ACTIVE) -->
                <a href="/admin/kriteria" class="flex items-center p-3 rounded-lg active-link transition duration-150 text-white">
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
                <a href="/admin/laporan" class="flex items-center p-3 rounded-lg hover:bg-secondary/30 transition duration-150">
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
                <h2 class="text-xl font-semibold text-primary">Data Kriteria & Bobot</h2>
                <div class="flex items-center space-x-3 text-primary">
                    <span class="text-sm font-medium text-gray-600">Admin</span>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                <div class="bg-white p-6 rounded-xl shadow-lg card-shadow border-t-4 border-secondary">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-primary">Kelola Kriteria & Bobot Preferensi (C)</h2>
                        <!-- Tombol yang memicu modal tambah kriteria -->
                        <button id="add-kriteria-btn" class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-[#5d6b59] transition duration-150 shadow-md">
                            + Tambah Kriteria
                        </button>
                    </div>

                    <!-- Keterangan TOPSIS -->
                    <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 mb-6 rounded-lg">
                        <p class="text-sm text-yellow-700 font-semibold">
                            Pastikan total Bobot ($\Sigma W$) memiliki nilai 100% atau telah dinormalisasi. (Metode TOPSIS)
                        </p>
                    </div>

                    <!-- Kriteria Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 card-shadow">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="table-header">
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Kode</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Nama Kriteria</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Sifat (Cost/Benefit)</th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold text-primary uppercase tracking-wider">Bobot (W)</th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold text-primary uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="kriteria-table-body" class="bg-white divide-y divide-gray-200">
                                <!-- Data akan diisi oleh JavaScript -->
                            </tbody>
                            <tfoot class="bg-gray-100">
                                <tr>
                                    <td colspan="4" class="px-6 py-3 text-right text-sm font-bold text-primary">Total Bobot:</td>
                                    <td id="total-bobot" class="px-6 py-3 text-center text-sm font-bold text-primary"></td>
                                    <td class="px-6 py-3"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- MODAL 1: TAMBAH KRITERIA -->
    <div id="add-kriteria-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
        <div class="modal-content bg-white w-full max-w-lg rounded-xl shadow-2xl p-6 transform transition-all duration-300">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 class="text-xl font-bold text-primary">Tambah Kriteria Baru</h3>
                <button id="close-add-modal-btn" class="text-gray-400 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>

            <form id="add-form" class="space-y-4">
                <!-- Field Kode Kriteria -->
                <div>
                    <label for="add-kode-input" class="block text-sm font-medium text-gray-700 mb-1">Kode Kriteria (C1, C2, dst.):</label>
                    <input type="text" id="add-kode-input" name="kode" placeholder="Contoh: C4" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary uppercase">
                </div>
                <!-- Field Nama Kriteria -->
                <div>
                    <label for="add-nama-input" class="block text-sm font-medium text-gray-700 mb-1">Nama Kriteria:</label>
                    <input type="text" id="add-nama-input" name="nama" placeholder="Contoh: Minat dan Bakat" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>
                <!-- Field Sifat (Cost/Benefit) -->
                <div>
                    <label for="add-sifat-select" class="block text-sm font-medium text-gray-700 mb-1">Sifat (Cost/Benefit):</label>
                    <select id="add-sifat-select" name="sifat" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                        <option value="" disabled selected>Pilih Sifat</option>
                        <option value="Benefit">Benefit (Nilai terbaik adalah terbesar)</option>
                        <option value="Cost">Cost (Nilai terbaik adalah terkecil)</option>
                    </select>
                </div>
                <!-- Field Bobot (W) -->
                <div>
                    <label for="add-bobot-input" class="block text-sm font-medium text-gray-700 mb-1">Bobot Preferensi (W):</label>
                    <input type="number" id="add-bobot-input" name="bobot" placeholder="Angka 1-5" min="1" max="5" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" id="cancel-add-modal-btn"
                        class="px-4 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400 transition duration-150">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-[#5d6b59] transition duration-150">
                        Simpan Kriteria
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL 1.5: EDIT KRITERIA -->
    <div id="edit-kriteria-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
        <div class="modal-content bg-white w-full max-w-lg rounded-xl shadow-2xl p-6 transform transition-all duration-300">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 class="text-xl font-bold text-primary" id="edit-modal-title">Edit Kriteria</h3>
                <button id="close-edit-modal-btn" class="text-gray-400 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>

            <form id="edit-form" class="space-y-4">
                <input type="hidden" id="edit-original-kode" name="original_kode">
                <!-- Field Kode Kriteria -->
                <div>
                    <label for="edit-kode-input" class="block text-sm font-medium text-gray-700 mb-1">Kode Kriteria (C1, C2, dst.):</label>
                    <input type="text" id="edit-kode-input" name="kode" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary uppercase">
                </div>
                <!-- Field Nama Kriteria -->
                <div>
                    <label for="edit-nama-input" class="block text-sm font-medium text-gray-700 mb-1">Nama Kriteria:</label>
                    <input type="text" id="edit-nama-input" name="nama" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>
                <!-- Field Sifat (Cost/Benefit) -->
                <div>
                    <label for="edit-sifat-select" class="block text-sm font-medium text-gray-700 mb-1">Sifat (Cost/Benefit):</label>
                    <select id="edit-sifat-select" name="sifat" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                        <option value="Benefit">Benefit (Nilai terbaik adalah terbesar)</option>
                        <option value="Cost">Cost (Nilai terbaik adalah terkecil)</option>
                    </select>
                </div>
                <!-- Field Bobot (W) -->
                <div>
                    <label for="edit-bobot-input" class="block text-sm font-medium text-gray-700 mb-1">Bobot Preferensi (W):</label>
                    <input type="number" id="edit-bobot-input" name="bobot" min="1" max="5" required
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
            <h3 class="mt-4 text-xl font-bold text-gray-800">Anda Yakin?</h3>
            <p class="mt-2 text-sm text-gray-600">
                Anda tidak akan dapat mengembalikan data Kriteria **<span id="kriteria-name-placeholder" class="font-semibold text-red-600"></span>** setelah dihapus!
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

    <!-- JAVASCRIPT untuk Logika CRUD Kriteria -->
    <script>
        // --- DATA MANAGEMENT (SIMULASI BACKEND) ---
        let kriteriaData = [
            { kode: 'C1', nama: 'Tingkat Kesulitan', sifat: 'Cost', bobot: 4 },
            { kode: 'C2', nama: 'Referensi', sifat: 'Benefit', bobot: 3 },
            { kode: 'C3', nama: 'Lapangan Pekerjaan', sifat: 'Benefit', bobot: 3 },
            { kode: 'C4', nama: 'Minat dan Bakat', sifat: 'Benefit', bobot: 5 },
        ];

        // --- ELEMEN DOM ---
        const kriteriaTableBody = document.getElementById('kriteria-table-body');
        const totalBobotDisplay = document.getElementById('total-bobot');
        const addKriteriaModal = document.getElementById('add-kriteria-modal');
        const editKriteriaModal = document.getElementById('edit-kriteria-modal');
        const deleteModal = document.getElementById('delete-confirmation-modal');

        const addForm = document.getElementById('add-form');
        const editForm = document.getElementById('edit-form');
        const kriteriaNamePlaceholder = document.getElementById('kriteria-name-placeholder');

        // Edit Form Inputs
        const editModalTitle = document.getElementById('edit-modal-title');
        const editOriginalKode = document.getElementById('edit-original-kode');
        const editKodeInput = document.getElementById('edit-kode-input');
        const editNamaInput = document.getElementById('edit-nama-input');
        const editSifatSelect = document.getElementById('edit-sifat-select');
        const editBobotInput = document.getElementById('edit-bobot-input');

        let currentKodeKriteria = null;

        // Fungsi untuk menyembunyikan semua modal
        const hideAllModals = () => {
            addKriteriaModal.classList.add('hidden');
            editKriteriaModal.classList.add('hidden');
            deleteModal.classList.add('hidden');
        };

        // Fungsi untuk menghitung dan menampilkan total bobot
        function calculateTotalBobot() {
            const total = kriteriaData.reduce((sum, kriteria) => sum + kriteria.bobot, 0);
            totalBobotDisplay.textContent = total;

            // Memberi warna indikator jika total tidak 100 (simulasi, karena bobot 1-5 adalah skala)
            if (total >= 15 && total <= 20) {
                 totalBobotDisplay.classList.remove('text-red-600');
                 totalBobotDisplay.classList.add('text-green-600');
            } else {
                 totalBobotDisplay.classList.remove('text-green-600');
                 totalBobotDisplay.classList.add('text-red-600');
            }
        }

        // --- CORE FUNCTION: RENDER DATA KE TABEL ---
        function renderTable() {
            kriteriaTableBody.innerHTML = '';

            if (kriteriaData.length === 0) {
                 kriteriaTableBody.innerHTML = `
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada data kriteria yang terdaftar.
                        </td>
                    </tr>
                `;
            }

            kriteriaData.forEach((kriteria, index) => {
                const isCost = kriteria.sifat === 'Cost';
                const sifatClass = isCost ? 'text-red-500' : 'text-green-600';

                const row = `
                    <tr class="${index % 2 === 1 ? 'bg-gray-50' : 'bg-white'}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${index + 1}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">${kriteria.kode}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">${kriteria.nama}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm ${sifatClass} font-semibold">${kriteria.sifat}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-bold text-primary">${kriteria.bobot}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                            <!-- Tombol Edit -->
                            <button onclick="handleEdit('${kriteria.kode}', '${kriteria.nama}', '${kriteria.sifat}', ${kriteria.bobot})" class="text-blue-500 hover:text-blue-700 p-1 rounded-full transition duration-150" title="Edit">
                                <svg xmlns="http://www.w3.org/2300/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                            </button>
                            <!-- Tombol Hapus -->
                            <button onclick="showDeleteConfirmation('${kriteria.kode}', '${kriteria.nama}')" class="text-red-500 hover:text-red-700 p-1 rounded-full transition duration-150" title="Hapus">
                                <svg xmlns="http://www.w3.org/2300/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                            </button>
                        </td>
                    </tr>
                `;
                kriteriaTableBody.insertAdjacentHTML('beforeend', row);
            });
            calculateTotalBobot();
        }

        // --- CRUD LOGIC FUNCTIONS ---

        // 1. CREATE
        addForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const newKriteria = {
                kode: document.getElementById('add-kode-input').value.toUpperCase(),
                nama: document.getElementById('add-nama-input').value,
                sifat: document.getElementById('add-sifat-select').value,
                bobot: parseInt(document.getElementById('add-bobot-input').value),
            };

            // Pengecekan duplikasi Kode Kriteria
            const kodeExists = kriteriaData.some(kriteria => kriteria.kode === newKriteria.kode);

            if (kodeExists) {
                 Swal.fire({ title: "Gagal!", text: `Kode Kriteria ${newKriteria.kode} sudah terdaftar.`, icon: "error", confirmButtonColor: "#EF4444" });
                 return;
            }

            // Tambahkan Kriteria baru ke array
            kriteriaData.push(newKriteria);

            hideAllModals();
            renderTable(); // Update tabel
            addForm.reset();

            Swal.fire({
                title: "Berhasil Ditambah!",
                text: `Kriteria ${newKriteria.kode} (${newKriteria.nama}) telah berhasil disimpan.`,
                icon: "success",
                confirmButtonColor: "#778873"
            });
        });

        // 2. READ / EDIT FORM FILLING (handleEdit)
        function handleEdit(kode, nama, sifat, bobot) {
            hideAllModals();

            // Mengisi judul modal
            editModalTitle.textContent = `Edit Kriteria: ${kode}`;

            // Mengisi data ke dalam form modal Edit
            editOriginalKode.value = kode;
            editKodeInput.value = kode;
            editNamaInput.value = nama;
            editSifatSelect.value = sifat;
            editBobotInput.value = bobot;

            // Menampilkan modal Edit
            editKriteriaModal.classList.remove('hidden');
        }

        // 3. UPDATE
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const originalKode = editOriginalKode.value;
            const updatedKode = editKodeInput.value.toUpperCase();
            const updatedNama = editNamaInput.value;

            // Cari index Kriteria yang akan diupdate
            const index = kriteriaData.findIndex(kriteria => kriteria.kode === originalKode);

            if (index !== -1) {

                // Pengecekan duplikasi Kode Kriteria selain data diri sendiri
                const kodeExists = kriteriaData.some((kriteria, i) => kriteria.kode === updatedKode && i !== index);

                 if (kodeExists) {
                    Swal.fire({ title: "Gagal!", text: `Kode Kriteria ${updatedKode} sudah terdaftar pada kriteria lain.`, icon: "error", confirmButtonColor: "#EF4444" });
                    return;
                }

                // Update data di array
                kriteriaData[index].kode = updatedKode;
                kriteriaData[index].nama = updatedNama;
                kriteriaData[index].sifat = editSifatSelect.value;
                kriteriaData[index].bobot = parseInt(editBobotInput.value);

                hideAllModals();
                renderTable(); // Update tabel

                Swal.fire({
                    title: "Tersimpan!",
                    text: `Kriteria ${updatedKode} telah berhasil diperbarui.`,
                    icon: "success",
                    confirmButtonColor: "#778873"
                });
            } else {
                 Swal.fire({
                    title: "Gagal!",
                    text: `Data Kriteria dengan kode ${originalKode} tidak ditemukan.`,
                    icon: "error",
                    confirmButtonColor: "#EF4444"
                });
            }
        });

        // 4. DELETE (Konfirmasi)
        function showDeleteConfirmation(kodeKriteria, namaKriteria) {
            currentKodeKriteria = kodeKriteria;
            hideAllModals();

            // Gunakan SweetAlert2 (Prioritas)
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: "Anda Yakin?",
                    text: `Anda akan menghapus kriteria ${namaKriteria} (${kodeKriteria})!`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#EF4444",
                    cancelButtonColor: "#6B7280",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Lanjutkan ke aksi Hapus (handleDelete)
                        handleDelete(currentKodeKriteria, namaKriteria);
                        Swal.fire({
                            title: "Terhapus!",
                            text: `Kriteria ${namaKriteria} telah berhasil dihapus.`,
                            icon: "success",
                            confirmButtonColor: "#778873"
                        });
                    }
                });
            } else {
                // Fallback ke Modal Kustom
                kriteriaNamePlaceholder.textContent = `${namaKriteria} (${kodeKriteria})`;
                deleteModal.classList.remove('hidden');
            }
        }

        // 5. DELETE (Aksi Eksekusi)
        function handleDelete(kodeKriteria) {
             // Hapus Kriteria dari array
            kriteriaData = kriteriaData.filter(kriteria => kriteria.kode !== kodeKriteria);

            renderTable(); // Update tabel
            hideAllModals();
        }

        // --- EVENT LISTENERS & INITIALIZATION ---
        document.addEventListener('DOMContentLoaded', function() {
            // Render data awal saat halaman dimuat
            renderTable();

            // Event listener untuk tombol Tambah Kriteria
            document.getElementById('add-kriteria-btn').addEventListener('click', () => {
                hideAllModals();
                addForm.reset();
                document.getElementById('add-sifat-select').value = '';
                addKriteriaModal.classList.remove('hidden');
            });

            // Event listener untuk menutup modal dengan tombol 'X' dan 'Batal'
            document.querySelectorAll('#close-add-modal-btn, #cancel-add-modal-btn').forEach(btn => {
                btn.addEventListener('click', hideAllModals);
            });
            document.querySelectorAll('#close-edit-modal-btn, #cancel-edit-modal-btn').forEach(btn => {
                btn.addEventListener('click', hideAllModals);
            });

            // Event listener untuk menutup modal dengan klik di luar area
            [addKriteriaModal, editKriteriaModal, deleteModal].forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        hideAllModals();
                    }
                });
            });

            // Event listener untuk Modal Hapus Kustom (Konfirmasi Ya Fallback)
            document.getElementById('delete-cancel-btn').addEventListener('click', hideAllModals);
            document.getElementById('delete-confirm-btn').addEventListener('click', () => {
                const deletedKriteria = kriteriaData.find(kriteria => kriteria.kode === currentKodeKriteria);
                handleDelete(currentKodeKriteria);

                if (typeof Swal !== 'undefined') {
                     Swal.fire({
                        title: "Terhapus!",
                        text: `Kriteria ${deletedKriteria ? deletedKriteria.nama : ''} telah berhasil dihapus.`,
                        icon: "success",
                        confirmButtonColor: "#778873"
                    });
                }
            });


            // Ekspos fungsi ke global scope agar dapat dipanggil dari onclick di HTML
            window.handleEdit = handleEdit;
            window.showDeleteConfirmation = showDeleteConfirmation;
        });
    </script>
</body>
</html>
