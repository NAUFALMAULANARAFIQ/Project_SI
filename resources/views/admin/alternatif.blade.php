<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Matakuliah Pilihan - SPK TOPSIS</title>
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
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <span class="ml-3">Data Decision Maker</span>
                </a>

                <!-- Data Alternatif (ACTIVE) -->
                <a href="/admin/alternatif" class="flex items-center p-3 rounded-lg active-link transition duration-150 text-white">
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
                <h2 class="text-xl font-semibold text-primary">Data Matakuliah Pilihan</h2>
                <div class="flex items-center space-x-3 text-primary">
                    <span class="text-sm font-medium text-gray-600">Admin</span>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                <div class="bg-white p-6 rounded-xl shadow-lg card-shadow border-t-4 border-secondary">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-primary">Kelola Matakuliah Pilihan</h2>
                        <!-- Tombol yang memicu modal tambah matakuliah -->
                        <button id="add-mk-btn" class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-[#5d6b59] transition duration-150 shadow-md">
                            + Tambah Matakuliah
                        </button>
                    </div>

                    <!-- Search and Filter -->
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-4 space-y-3 sm:space-y-0 sm:space-x-4">
                        <input type="text" id="search-input" placeholder="Cari Kode MK, Nama, atau SKS..."
                            class="w-full sm:w-2/3 p-3 border border-gray-300 rounded-lg focus:ring-secondary focus:border-secondary">

                        <select id="filter-semester" class="w-full sm:w-1/3 p-3 border border-gray-300 rounded-lg focus:ring-secondary focus:border-secondary">
                            <option value="">Semua Semester</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                            <option value="6">Semester 6</option>
                            <option value="7">Semester 7</option>
                            <option value="8">Semester 8</option>
                        </select>
                    </div>

                    <!-- Matakuliah Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200 card-shadow">
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
                            <tbody id="mk-table-body" class="bg-white divide-y divide-gray-200">
                                <!-- Data akan diisi oleh JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- MODAL 1: TAMBAH MATAKULIAH -->
    <div id="add-mk-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
        <div class="modal-content bg-white w-full max-w-lg rounded-xl shadow-2xl p-6 transform transition-all duration-300">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 class="text-xl font-bold text-primary" id="add-modal-title">Tambah Matakuliah Pilihan Baru</h3>
                <button id="close-add-modal-btn" class="text-gray-400 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>

            <form id="add-form" class="space-y-4">
                <!-- Field Kode MK -->
                <div>
                    <label for="add-kode-mk-input" class="block text-sm font-medium text-gray-700 mb-1">Kode Matakuliah:</label>
                    <input type="text" id="add-kode-mk-input" name="kode_mk" placeholder="Contoh: MAS2231" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>
                <!-- Field Nama Matakuliah -->
                <div>
                    <label for="add-nama-mk-input" class="block text-sm font-medium text-gray-700 mb-1">Nama Matakuliah:</label>
                    <input type="text" id="add-nama-mk-input" name="nama_mk" placeholder="Contoh: Pengolahan Citra Digital" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>
                <!-- Field SKS -->
                <div>
                    <label for="add-sks-input" class="block text-sm font-medium text-gray-700 mb-1">Jumlah SKS:</label>
                    <input type="number" id="add-sks-input" name="sks" placeholder="Contoh: 3" min="1" max="4" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>
                <!-- Field Semester -->
                <div>
                    <label for="add-semester-select" class="block text-sm font-medium text-gray-700 mb-1">Semester:</label>
                    <select id="add-semester-select" name="semester" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                        <option value="" disabled selected>Pilih Semester</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" id="cancel-add-modal-btn"
                        class="px-4 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400 transition duration-150">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-primary text-white font-semibold rounded-lg hover:bg-[#5d6b59] transition duration-150">
                        Simpan Matakuliah
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL 1.5: EDIT MATAKULIAH -->
    <div id="edit-mk-modal" class="modal fixed inset-0 flex items-center justify-center hidden p-4">
        <div class="modal-content bg-white w-full max-w-lg rounded-xl shadow-2xl p-6 transform transition-all duration-300">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 class="text-xl font-bold text-primary" id="edit-modal-title">Edit Matakuliah</h3>
                <button id="close-edit-modal-btn" class="text-gray-400 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2300/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>

            <form id="edit-form" class="space-y-4">
                <input type="hidden" id="edit-original-kode-mk" name="original_kode_mk">
                <!-- Field Kode MK -->
                <div>
                    <label for="edit-kode-mk-input" class="block text-sm font-medium text-gray-700 mb-1">Kode Matakuliah:</label>
                    <input type="text" id="edit-kode-mk-input" name="kode_mk" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>
                <!-- Field Nama Matakuliah -->
                <div>
                    <label for="edit-nama-mk-input" class="block text-sm font-medium text-gray-700 mb-1">Nama Matakuliah:</label>
                    <input type="text" id="edit-nama-mk-input" name="nama_mk" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>
                <!-- Field SKS -->
                <div>
                    <label for="edit-sks-input" class="block text-sm font-medium text-gray-700 mb-1">Jumlah SKS:</label>
                    <input type="number" id="edit-sks-input" name="sks" min="1" max="4" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                </div>
                <!-- Field Semester -->
                <div>
                    <label for="edit-semester-select" class="block text-sm font-medium text-gray-700 mb-1">Semester:</label>
                    <select id="edit-semester-select" name="semester" required
                        class="w-full p-3 border border-gray-300 rounded-lg focus:border-secondary focus:ring-secondary">
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
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
                Anda tidak akan dapat mengembalikan data Matakuliah **<span id="mk-name-placeholder" class="font-semibold text-red-600"></span>** setelah dihapus!
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

    <!-- JAVASCRIPT untuk Logika CRUD, Pencarian, dan Filter -->
    <script>
        // --- DATA MANAGEMENT (SIMULASI BACKEND) ---
        let matakuliahData = [
            { kode: 'MAS2231', nama: 'Pengolahan Citra Digital', sks: 3, semester: '4' },
            { kode: 'MAS2232', nama: 'Perancangan Sumber Daya Perusahaan', sks: 3, semester: '4' },
            { kode: 'MAS2233', nama: 'Jaringan Komputer Lanjut', sks: 3, semester: '5' },
            { kode: 'MAS2234', nama: 'Kecerdasan Buatan', sks: 3, semester: '5' },
            { kode: 'MAS2235', nama: 'Kriptografi', sks: 3, semester: '6' },
            { kode: 'MAS2236', nama: 'Topik Khusus Sistem Informasi', sks: 2, semester: '6' },
            { kode: 'MAS2237', nama: 'Basis Data Terdistribusi', sks: 3, semester: '7' },
        ];

        // --- ELEMEN DOM ---
        const mkTableBody = document.getElementById('mk-table-body');
        const addMkModal = document.getElementById('add-mk-modal');
        const editMkModal = document.getElementById('edit-mk-modal');
        const deleteModal = document.getElementById('delete-confirmation-modal');

        const addForm = document.getElementById('add-form');
        const editForm = document.getElementById('edit-form');
        const searchInput = document.getElementById('search-input');
        const filterSemester = document.getElementById('filter-semester');

        const mkNamePlaceholder = document.getElementById('mk-name-placeholder');

        // Edit Form Inputs
        const editModalTitle = document.getElementById('edit-modal-title');
        const editOriginalKodeMk = document.getElementById('edit-original-kode-mk');
        const editKodeMkInput = document.getElementById('edit-kode-mk-input');
        const editNamaMkInput = document.getElementById('edit-nama-mk-input');
        const editSksInput = document.getElementById('edit-sks-input');
        const editSemesterSelect = document.getElementById('edit-semester-select');

        let currentKodeMk = null;

        // Fungsi untuk menyembunyikan semua modal
        const hideAllModals = () => {
            addMkModal.classList.add('hidden');
            editMkModal.classList.add('hidden');
            deleteModal.classList.add('hidden');
        };

        // --- CORE FUNCTION: RENDER DATA KE TABEL (dengan Filter dan Search) ---
        function renderTable() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedSemester = filterSemester.value;

            const filteredData = matakuliahData.filter(mk => {
                // Filter Semester
                const semesterMatch = selectedSemester === '' || mk.semester === selectedSemester;

                // Search Keyword (Kode MK, Nama, atau SKS)
                const searchMatch =
                    mk.kode.toLowerCase().includes(searchTerm) ||
                    mk.nama.toLowerCase().includes(searchTerm) ||
                    mk.sks.toString().includes(searchTerm);

                return semesterMatch && searchMatch;
            });

            mkTableBody.innerHTML = '';

            if (filteredData.length === 0) {
                 mkTableBody.innerHTML = `
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada data matakuliah yang sesuai dengan kriteria pencarian.
                        </td>
                    </tr>
                `;
                return;
            }

            filteredData.forEach((mk, index) => {
                const row = `
                    <tr class="${index % 2 === 1 ? 'bg-gray-50' : 'bg-white'}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${index + 1}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">${mk.kode}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">${mk.nama}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${mk.sks}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${mk.semester}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                            <!-- Tombol Edit -->
                            <button onclick="handleEdit('${mk.kode}', '${mk.nama}', ${mk.sks}, '${mk.semester}')" class="text-blue-500 hover:text-blue-700 p-1 rounded-full transition duration-150" title="Edit">
                                <svg xmlns="http://www.w3.org/2300/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>
                            </button>
                            <!-- Tombol Hapus -->
                            <button onclick="showDeleteConfirmation('${mk.kode}', '${mk.nama}')" class="text-red-500 hover:text-red-700 p-1 rounded-full transition duration-150" title="Hapus">
                                <svg xmlns="http://www.w3.org/2300/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                            </button>
                        </td>
                    </tr>
                `;
                mkTableBody.insertAdjacentHTML('beforeend', row);
            });
        }


        // --- CRUD LOGIC FUNCTIONS ---

        // 1. CREATE
        addForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const newMk = {
                kode: document.getElementById('add-kode-mk-input').value.toUpperCase(),
                nama: document.getElementById('add-nama-mk-input').value,
                sks: parseInt(document.getElementById('add-sks-input').value),
                semester: document.getElementById('add-semester-select').value,
            };

            // Pengecekan duplikasi Kode MK
            const kodeExists = matakuliahData.some(mk => mk.kode === newMk.kode);

            if (kodeExists) {
                 Swal.fire({ title: "Gagal!", text: `Kode MK ${newMk.kode} sudah terdaftar.`, icon: "error", confirmButtonColor: "#EF4444" });
                 return;
            }

            // Tambahkan MK baru ke array
            matakuliahData.push(newMk);

            hideAllModals();
            renderTable(); // Update tabel
            addForm.reset();

            Swal.fire({
                title: "Berhasil Ditambah!",
                text: `Matakuliah ${newMk.nama} (${newMk.kode}) telah berhasil disimpan.`,
                icon: "success",
                confirmButtonColor: "#778873"
            });
        });

        // 2. READ / EDIT FORM FILLING (handleEdit)
        function handleEdit(kode, nama, sks, semester) {
            hideAllModals(); // Pastikan modal lain tertutup

            // Mengisi judul modal
            editModalTitle.textContent = `Edit Matakuliah: ${kode}`;

            // Mengisi data ke dalam form modal Edit
            editOriginalKodeMk.value = kode;
            editKodeMkInput.value = kode;
            editNamaMkInput.value = nama;
            editSksInput.value = sks;
            editSemesterSelect.value = semester;

            // Menampilkan modal Edit
            editMkModal.classList.remove('hidden');
        }

        // 3. UPDATE
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const originalKode = editOriginalKodeMk.value;
            const updatedKode = editKodeMkInput.value.toUpperCase();
            const updatedNama = editNamaMkInput.value;

            // Cari index MK yang akan diupdate
            const index = matakuliahData.findIndex(mk => mk.kode === originalKode);

            if (index !== -1) {

                // Pengecekan duplikasi Kode MK selain data diri sendiri
                const kodeExists = matakuliahData.some((mk, i) => mk.kode === updatedKode && i !== index);

                 if (kodeExists) {
                    Swal.fire({ title: "Gagal!", text: `Kode MK ${updatedKode} sudah terdaftar pada matakuliah lain.`, icon: "error", confirmButtonColor: "#EF4444" });
                    return;
                }

                // Update data di array
                matakuliahData[index].kode = updatedKode;
                matakuliahData[index].nama = updatedNama;
                matakuliahData[index].sks = parseInt(editSksInput.value);
                matakuliahData[index].semester = editSemesterSelect.value;

                hideAllModals();
                renderTable(); // Update tabel

                Swal.fire({
                    title: "Tersimpan!",
                    text: `Matakuliah ${updatedNama} (${updatedKode}) telah berhasil diperbarui.`,
                    icon: "success",
                    confirmButtonColor: "#778873"
                });
            } else {
                 Swal.fire({
                    title: "Gagal!",
                    text: `Data MK dengan kode ${originalKode} tidak ditemukan.`,
                    icon: "error",
                    confirmButtonColor: "#EF4444"
                });
            }
        });

        // 4. DELETE (Konfirmasi)
        function showDeleteConfirmation(kodeMk, namaMk) {
            currentKodeMk = kodeMk;
            hideAllModals();

            // Gunakan SweetAlert2 (Prioritas)
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: "Anda Yakin?",
                    text: `Anda akan menghapus matakuliah ${namaMk} (${kodeMk})!`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#EF4444",
                    cancelButtonColor: "#6B7280",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Lanjutkan ke aksi Hapus (handleDelete)
                        handleDelete(currentKodeMk, namaMk);
                        Swal.fire({
                            title: "Terhapus!",
                            text: `Matakuliah ${namaMk} telah berhasil dihapus.`,
                            icon: "success",
                            confirmButtonColor: "#778873"
                        });
                    }
                });
            } else {
                // Fallback ke Modal Kustom
                mkNamePlaceholder.textContent = `${namaMk} (${kodeMk})`;
                deleteModal.classList.remove('hidden');
            }
        }

        // 5. DELETE (Aksi Eksekusi)
        function handleDelete(kodeMk) {
             // Hapus MK dari array
            matakuliahData = matakuliahData.filter(mk => mk.kode !== kodeMk);

            renderTable(); // Update tabel
            hideAllModals();
        }

        // --- EVENT LISTENERS & INITIALIZATION ---
        document.addEventListener('DOMContentLoaded', function() {
            // Render data awal saat halaman dimuat
            renderTable();

            // Event listener untuk tombol Tambah Matakuliah
            document.getElementById('add-mk-btn').addEventListener('click', () => {
                hideAllModals();
                addForm.reset();
                // Set default value for semester in add form to prevent issues
                document.getElementById('add-semester-select').value = '';
                addMkModal.classList.remove('hidden');
            });

            // Event listener untuk menutup modal dengan tombol 'X' dan 'Batal'
            document.querySelectorAll('#close-add-modal-btn, #cancel-add-modal-btn').forEach(btn => {
                btn.addEventListener('click', hideAllModals);
            });
            document.querySelectorAll('#close-edit-modal-btn, #cancel-edit-modal-btn').forEach(btn => {
                btn.addEventListener('click', hideAllModals);
            });

            // Event listener untuk menutup modal dengan klik di luar area
            [addMkModal, editMkModal, deleteModal].forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        hideAllModals();
                    }
                });
            });

            // Event listeners untuk Pencarian dan Filter
            searchInput.addEventListener('input', renderTable);
            filterSemester.addEventListener('change', renderTable);

            // Event listener untuk Modal Hapus Kustom (Konfirmasi Ya Fallback)
            document.getElementById('delete-cancel-btn').addEventListener('click', hideAllModals);
            document.getElementById('delete-confirm-btn').addEventListener('click', () => {
                // Logika Hapus (Modal Kustom Fallback)
                const deletedMk = matakuliahData.find(mk => mk.kode === currentKodeMk);
                handleDelete(currentKodeMk);

                if (typeof Swal !== 'undefined') {
                     Swal.fire({
                        title: "Terhapus!",
                        text: `Matakuliah ${deletedMk ? deletedMk.nama : ''} telah berhasil dihapus.`,
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
