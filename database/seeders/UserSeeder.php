<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'kaprodi',
            'email' => 'kaprodi@univ.ac.id',
            'password' => Hash::make('password'),
            'level_user' => 'ketua',
            'status' => 'aktif',
        ]);

        User::create([
            'username' => 'dosen1',
            'email' => 'dosen1@univ.ac.id',
            'password' => Hash::make('password'),
            'level_user' => 'anggota',
            'status' => 'aktif',
        ]);

        User::create([
            'username' => 'dosen2',
            'email' => 'dosen2@univ.ac.id',
            'password' => Hash::make('password'),
            'level_user' => 'anggota',
            'status' => 'aktif',
        ]);
    }
}
