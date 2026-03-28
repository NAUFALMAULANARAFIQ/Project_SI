<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perhitungan_Detail;

class PerhitunganDetailSeeder extends Seeder
{
    public function run(): void
    {
        Perhitungan_Detail::create([
            'id_perhitungan' => 1,
            'id_kriteria' => 1,
            'bobot' => 5,
            'id_user' => 1,
            'id_mp' => 1,
        ]);

        Perhitungan_Detail::create([
            'id_perhitungan' => 1,
            'id_kriteria' => 2,
            'bobot' => 4,
            'id_user' => 1,
            'id_mp' => 1,
        ]);
    }
}
