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

    public function decission(){
        return view ('admin.decission');
    }

    public function alternatif(){
        return view ('admin.alternatif');
    }

    public function perhitunganform(){
        return view ('mahasiswa.perhitungan_form');
    }

    public function penilaian(){
        return view ('admin.penilaian');
    }

    public function individu(){
        return view ('admin.hasil_individu');
    }

    public function kelompok(){
        return view ('admin.hasil_kelompok');
    }

    public function laporan(){
        return view ('admin.laporan');
    }

}
