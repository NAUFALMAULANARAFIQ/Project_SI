<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mk_Plhn as AlternatifModel; // reuse model if Alternatif model missing

class AlternatifSeeder extends Seeder
{
    public function run(): void
    {
        // The project uses mk_plhn for mata kuliah (alternatif). If there is an Alternatif table, adapt accordingly.
        AlternatifModel::create(['kode_mp' => 'MP101', 'nama_mp' => 'Matematika Dasar', 'semester' => 1]);
        AlternatifModel::create(['kode_mp' => 'MP102', 'nama_mp' => 'Algoritma', 'semester' => 2]);
        AlternatifModel::create(['kode_mp' => 'MP103', 'nama_mp' => 'Basis Data', 'semester' => 3]);
    }
}
