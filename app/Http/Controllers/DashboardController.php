<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardadmin(){
        return view ('admin.dashboard');
    }

    public function hasilperhitungan(){
        return view ('mahasiswa.hasil_perhitungan');
    }

    public function kriteria(){
        return view ('admin.kriteria');
    }

    public function mahasiswa(){
        return view ('admin.mahasiswa');
    }

    public function matakuliah(){
        return view ('admin.matakuliah');
    }

    public function perhitunganform(){
        return view ('mahasiswa.perhitungan_form');
    }

}
