<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kriteria;
use App\Models\Kepentingan;
use App\Models\Mk_Plhn;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // --- 1. SEEDING USER (ADMIN & DOSEN/ANGGOTA) ---

        // 1. Akun KAPRODI (Ketua)
        User::create([
            'username' => 'kaprodi',
            'email' => 'kaprodi@univ.ac.id',
            'password' => Hash::make('password'),
            'level_user' => 'ketua',
            'status' => 'aktif',
        ]);

        // 2. Akun DOSEN 1 (Anggota)
        User::create([
            'username' => 'dosen1',
            'email' => 'dosen1@univ.ac.id',
            'password' => Hash::make('password'),
            'level_user' => 'anggota',
            'status' => 'aktif',
        ]);

        // 3. Akun DOSEN 2 (Anggota)
        User::create([
            'username' => 'dosen2',
            'email' => 'dosen2@univ.ac.id',
            'password' => Hash::make('password'),
            'level_user' => 'anggota',
            'status' => 'aktif',
        ]);



        // --- 2. SEEDING MATA KULIAH PILIHAN (DATA DARI JURNAL TABEL 1) ---
        $matakuliah = [
            ['kode_mp' => 'MAS2231', 'nama_mp' => 'Pengolahan Citra Digital', 'semester' => 4],
            ['kode_mp' => 'MAS2232', 'nama_mp' => 'Perancangan Sumber Daya Perusahaan', 'semester' => 4],
            ['kode_mp' => 'MAS2233', 'nama_mp' => 'Data Mining', 'semester' => 4],
            ['kode_mp' => 'MAS3131', 'nama_mp' => 'Business Intelligence', 'semester' => 5],
            ['kode_mp' => 'MAS3132', 'nama_mp' => 'Sistem Terdistribusi', 'semester' => 5],
            ['kode_mp' => 'MAS3133', 'nama_mp' => 'Sistem Temu Kembali Informasi', 'semester' => 5],
            ['kode_mp' => 'MAS3134', 'nama_mp' => 'Web Lanjut', 'semester' => 5],
            ['kode_mp' => 'MAS3231', 'nama_mp' => 'Analisis Proses Bisnis', 'semester' => 6],
            ['kode_mp' => 'MAS3232', 'nama_mp' => 'Tatakelola dan Audit Sistem Informasi', 'semester' => 6],
            ['kode_mp' => 'MAS3233', 'nama_mp' => 'Pemodelan Data Spasial SPK', 'semester' => 6],
            ['kode_mp' => 'MAS3234', 'nama_mp' => 'Pengindraan Jarak Jauh', 'semester' => 6],
        ];

        foreach ($matakuliah as $mk) {
            Mk_Plhn::create($mk);
        }


        // --- 3. SEEDING KRITERIA (DATA DARI JURNAL TABEL 2) ---
        $kriteria = [
            ['nama_kriteria' => 'Tingkat Kesulitan', 'cost_benefit' => 'cost', 'bobot' => 4],
            ['nama_kriteria' => 'Referensi', 'cost_benefit' => 'benefit', 'bobot' => 3],
            ['nama_kriteria' => 'Lapangan Pekerjaan', 'cost_benefit' => 'benefit', 'bobot' => 3],
            ['nama_kriteria' => 'Minat', 'cost_benefit' => 'benefit', 'bobot' => 3],
            ['nama_kriteria' => 'Bakat', 'cost_benefit' => 'benefit', 'bobot' => 3],
        ];

        foreach ($kriteria as $k) {
            Kriteria::create($k);
        }


        // --- 4. SEEDING SKALA KEPENTINGAN / BOBOT (DATA DARI JURNAL TABEL 3) ---
        $kepentingan = [
            ['nama_bobot' => 'Sangat Rendah', 'bobot' => 1],
            ['nama_bobot' => 'Rendah', 'bobot' => 2],
            ['nama_bobot' => 'Cukup Tinggi', 'bobot' => 3],
            ['nama_bobot' => 'Tinggi', 'bobot' => 4],
            ['nama_bobot' => 'Sangat Tinggi', 'bobot' => 5],
        ];

        foreach ($kepentingan as $kp) {
            Kepentingan::create($kp);
        }
    }
}
