<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Kriteria;
use App\Models\Kepentingan;
use App\Models\Mk_Plhn;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // DatabaseSeeder.php

        // 1. Akun KAPRODI (Jabatan Tertinggi - Bisa Trigger Borda)
        User::create([
            'username' => 'kaprodi',
            'email' => 'kaprodi@univ.ac.id',
            'password' => Hash::make('password'),
            'level_user' => 'ketua', // Kita anggap admin sebagai ketua
            'status' => 'aktif',
        ]);

        // 2. Akun DOSEN 1 (Anggota)
        User::create([
            'username' => 'dosen1',
            'email' => 'dosen1@univ.ac.id',
            'password' => Hash::make('password'),
            'level_user' => 'anggota', // Kita pinjam role 'mahasiswa' sebagai anggota biasa
            'status' => 'aktif',
        ]);

        // 3. Akun DOSEN 2 (Anggota)
        User::create([
            'username' => 'dosen2',
            'email' => 'dosen2@univ.ac.id',
            'password' => Hash::make('password'),
            'level_user' => 'anggota', // Anggota biasa
            'status' => 'aktif',
        ]);
    }
}
