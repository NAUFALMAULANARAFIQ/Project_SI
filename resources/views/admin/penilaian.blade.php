<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penilaian - SPK TOPSIS</title>
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
         /* Style untuk Select */
        .select-custom {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='none' stroke='%23778873' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.7rem center;
            background-size: 1.5em;
            padding-right: 2.5rem;
        }
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

                <!-- Form Penilaian (ACTIVE) -->
                <a href="/admin/penilaian" class="flex items-center p-3 rounded-lg active-link transition duration-150 text-white">
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
                <h2 class="text-xl font-semibold text-primary">Form Penilaian Matakuliah Pilihan</h2>
                <div class="flex items-center space-x-3 text-primary">
                    <span id="dm-role" class="text-sm font-medium text-gray-600">Decision Maker (Admin)</span>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                <div class="bg-white p-8 rounded-xl card-shadow border-t-4 border-secondary">
                    <h1 class="text-2xl font-bold text-primary mb-6">Input Penilaian Kriteria Matakuliah</h1>

                    <form id="penilaian-form" class="space-y-6">

                        <!-- Pilihan Semester/Matakuliah -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center border-b pb-4">
                            <div>
                                <label for="semester_pilihan" class="block text-sm font-semibold text-gray-700 mb-1">Pilih Semester Matakuliah:</label>
                                <select id="semester_pilihan" name="semester_pilihan" required class="w-full p-3 border-2 border-gray-300 rounded-lg select-custom focus:border-primary focus:ring-primary">
                                    <option value="" disabled selected>-- Pilih Semester --</option>
                                    <option value="4">Semester IV</option>
                                    <option value="5">Semester V</option>
                                    <option value="6">Semester VI</option>
                                    <option value="7">Semester VII</option>
                                    <option value="8">Semester VIII</option>
                                </select>
                            </div>
                            <div>
                                <label for="matakuliah_pilihan" class="block text-sm font-semibold text-gray-700 mb-1">Pilih Matakuliah yang dinilai:</label>
                                <select id="matakuliah_pilihan" name="matakuliah_pilihan" required
                                    class="w-full p-3 border-2 border-gray-300 rounded-lg select-custom focus:border-primary focus:ring-primary" disabled>
                                    <option value="" disabled selected>-- Pilih Matakuliah --</option>
                                    <!-- Options diisi dinamis oleh JS -->
                                </select>
                            </div>
                        </div>

                        <!-- Kriteria Penilaian Table -->
                        <div id="penilaian-container" class="pt-4 hidden">
                            <h2 class="text-xl font-bold text-secondary border-b pb-2 mb-4">Penilaian Kriteria (1=Sangat Rendah, 5=Sangat Tinggi)</h2>

                            <div class="overflow-x-auto rounded-lg border border-gray-200 card-shadow">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr class="table-header">
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">No</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Kode Kriteria</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Nama Kriteria</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-primary uppercase tracking-wider">Sifat</th>
                                            <th class="px-6 py-3 text-center text-xs font-semibold text-primary uppercase tracking-wider">Nilai (1-5)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="kriteria-penilaian-body" class="bg-white divide-y divide-gray-200">
                                        <!-- Kriteria diisi dinamis oleh JS -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Tombol Simpan/Hitung -->
                        <div class="flex justify-end space-x-4 pt-4">
                            <button type="submit" id="submit-penilaian"
                                    class="px-6 py-3 bg-primary text-white font-semibold rounded-lg hover:bg-[#5d6b59] transition duration-200 card-shadow">
                                Simpan Penilaian & Selesai
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </main>
    </div>

    <!-- JAVASCRIPT untuk Logika Penilaian Dinamis -->
    <script>
        // --- DATA SIMULASI ---
        const decisionMaker = "DM-001 (Admin)";

        const kriteriaData = [
            { kode: 'C1', nama: 'Tingkat Kesulitan', sifat: 'Cost' },
            { kode: 'C2', nama: 'Referensi', sifat: 'Benefit' },
            { kode: 'C3', nama: 'Lapangan Pekerjaan', sifat: 'Benefit' },
            { kode: 'C4', nama: 'Minat dan Bakat', sifat: 'Benefit' },
            // Tambahkan kriteria lain jika diperlukan
        ];

        // Simulasikan data matakuliah berdasarkan semester
        const matakuliahData = [
             { kode: 'MAS2231', nama: 'Pengolahan Citra Digital', semester: '4' },
             { kode: 'MAS2232', nama: 'Perancangan Sumber Daya Perusahaan', semester: '4' },
             { kode: 'MAS2233', nama: 'Matematika Dasar', semester: '4' }, // Contoh untuk Coba
             { kode: 'MAS2234', nama: 'Jaringan Komputer Lanjut', semester: '5' },
             { kode: 'MAS2235', nama: 'Kecerdasan Buatan', semester: '5' },
             { kode: 'MAS2236', nama: 'Kriptografi', semester: '6' },
             { kode: 'MAS2237', nama: 'Basis Data Terdistribusi', semester: '7' },
        ];

        // --- ELEMEN DOM ---
        const semesterPilihan = document.getElementById('semester_pilihan');
        const matakuliahPilihan = document.getElementById('matakuliah_pilihan');
        const penilaianContainer = document.getElementById('penilaian-container');
        const kriteriaPenilaianBody = document.getElementById('kriteria-penilaian-body');
        const penilaianForm = document.getElementById('penilaian-form');

        // --- FUNGSI UTAMA ---

        // 1. Mengisi Matakuliah berdasarkan Semester yang Dipilih
        function populateMatakuliah() {
            const selectedSemester = semesterPilihan.value;
            matakuliahPilihan.innerHTML = '<option value="" disabled selected>-- Pilih Matakuliah --</option>';
            matakuliahPilihan.disabled = true;
            kriteriaPenilaianBody.innerHTML = '';
            penilaianContainer.classList.add('hidden');

            if (selectedSemester) {
                const filteredMk = matakuliahData.filter(mk => mk.semester === selectedSemester);

                filteredMk.forEach(mk => {
                    const option = document.createElement('option');
                    option.value = mk.kode;
                    option.textContent = `${mk.nama} (${mk.kode})`;
                    matakuliahPilihan.appendChild(option);
                });
                matakuliahPilihan.disabled = filteredMk.length === 0;
            }
        }

        // 2. Mengisi Tabel Penilaian Kriteria
        function renderKriteriaTable() {
            kriteriaPenilaianBody.innerHTML = '';

            kriteriaData.forEach((kriteria, index) => {
                const isCost = kriteria.sifat === 'Cost';
                const sifatClass = isCost ? 'text-red-500' : 'text-green-600';

                let selectOptions = '<option value="" disabled selected>-- Pilih --</option>';
                for (let i = 1; i <= 5; i++) {
                    selectOptions += `<option value="${i}">${i}</option>`;
                }

                const row = `
                    <tr class="${index % 2 === 1 ? 'bg-gray-50' : 'bg-white'}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${index + 1}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">${kriteria.kode}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">${kriteria.nama} (${kriteria.kode})</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm ${sifatClass} font-semibold">${kriteria.sifat}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <select name="${kriteria.kode}" class="p-2 border border-gray-300 rounded-lg text-sm select-custom w-full max-w-[100px] mx-auto" required>
                                ${selectOptions}
                            </select>
                        </td>
                    </tr>
                `;
                kriteriaPenilaianBody.insertAdjacentHTML('beforeend', row);
            });
            penilaianContainer.classList.remove('hidden');
        }

        // 3. Menangani Submission Form (Simpan Penilaian)
        function handleSubmit(e) {
            e.preventDefault();

            const selectedMkKode = matakuliahPilihan.value;
            const selectedMk = matakuliahData.find(mk => mk.kode === selectedMkKode);

            if (!selectedMkKode) {
                Swal.fire({
                    title: "Peringatan",
                    text: "Mohon pilih Matakuliah yang akan dinilai terlebih dahulu.",
                    icon: "warning",
                    confirmButtonColor: "#778873"
                });
                return;
            }

            const formData = new FormData(penilaianForm);
            const penilaianResult = {};
            let isComplete = true;

            kriteriaData.forEach(kriteria => {
                const nilai = formData.get(kriteria.kode);
                if (!nilai) {
                    isComplete = false;
                }
                penilaianResult[kriteria.kode] = nilai;
            });

            if (!isComplete) {
                Swal.fire({
                    title: "Peringatan",
                    text: "Mohon lengkapi semua penilaian kriteria (nilai 1-5).",
                    icon: "warning",
                    confirmButtonColor: "#778873"
                });
                return;
            }

            // Membangun pesan hasil
            let message = `<p class="text-left mb-3"><strong>Matakuliah:</strong> ${selectedMk.nama} (${selectedMk.kode})</p>
                           <p class="text-left mb-3"><strong>Penilai:</strong> ${decisionMaker}</p>
                           <hr class="my-3 border-secondary/50">
                           <p class="text-left font-bold mb-2">Rincian Nilai:</p>
                           <ul class="list-disc list-inside text-left">`;

            kriteriaData.forEach(kriteria => {
                const nilai = penilaianResult[kriteria.kode];
                const sifatClass = kriteria.sifat === 'Cost' ? 'text-red-500' : 'text-green-600';
                message += `<li><strong>${kriteria.kode} - ${kriteria.nama}</strong>: <span class="font-bold">${nilai}</span> (${kriteria.sifat} <span class="${sifatClass}">| ${kriteria.sifat}</span>)</li>`;
            });
            message += `</ul>`;


            // Tampilkan hasil simulasi penyimpanan
            Swal.fire({
                title: "Penilaian Berhasil Disimpan!",
                html: message,
                icon: "success",
                confirmButtonText: "Selesai",
                confirmButtonColor: "#778873"
            }).then(() => {
                // Opsional: Reset form setelah sukses
                penilaianForm.reset();
                kriteriaPenilaianBody.innerHTML = '';
                penilaianContainer.classList.add('hidden');
                matakuliahPilihan.disabled = true;
                populateMatakuliah();
            });
        }


        // --- EVENT LISTENERS ---
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi awal (mengisi daftar matakuliah pertama kali)
            populateMatakuliah();

            // Event Listener: Ketika Semester dipilih, update Matakuliah
            semesterPilihan.addEventListener('change', populateMatakuliah);

            // Event Listener: Ketika Matakuliah dipilih, render tabel penilaian
            matakuliahPilihan.addEventListener('change', renderKriteriaTable);

            // Event Listener: Ketika form disubmit
            penilaianForm.addEventListener('submit', handleSubmit);
        });

    </script>
</body>
</html>
