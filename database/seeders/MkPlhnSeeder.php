<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mk_Plhn;

class MkPlhnSeeder extends Seeder
{
    public function run(): void
    {
        Mk_Plhn::create(['kode_mp' => 'MP101', 'nama_mp' => 'Matematika Dasar','sks' => 3, 'semester' => 1]);
        Mk_Plhn::create(['kode_mp' => 'MP102', 'nama_mp' => 'Algoritma', 'sks' => 3, 'semester' => 2]);
        Mk_Plhn::create(['kode_mp' => 'MP103', 'nama_mp' => 'Basis Data', 'sks' => 3, 'semester' => 3]);
    }
}
