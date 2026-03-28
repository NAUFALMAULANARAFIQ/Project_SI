<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perhitungan;

class PerhitunganSeeder extends Seeder
{
    public function run(): void
    {
        // Create a basic perhitungan row for user 1 and mk 1
        Perhitungan::create(['id_user' => 1, 'id_mp' => 1, 'hasil' => 0.85]);
    }
}
