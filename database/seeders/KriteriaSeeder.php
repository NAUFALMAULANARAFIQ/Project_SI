<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {
        Kriteria::create(['nama_kriteria' => 'Kualitas Materi', 'cost_benefit' => 'benefit', 'bobot' => 0.4]);
        Kriteria::create(['nama_kriteria' => 'Kelengkapan Silabus', 'cost_benefit' => 'benefit', 'bobot' => 0.3]);
        Kriteria::create(['nama_kriteria' => 'Keaktifan', 'cost_benefit' => 'benefit', 'bobot' => 0.3]);
    }
}
