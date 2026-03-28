<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kepentingan;

class KepentinganSeeder extends Seeder
{
    public function run(): void
    {
        Kepentingan::create(['nama_bobot' => 'Sangat Penting', 'bobot' => 5]);
        Kepentingan::create(['nama_bobot' => 'Penting', 'bobot' => 3]);
        Kepentingan::create(['nama_bobot' => 'Cukup', 'bobot' => 1]);
    }
}
