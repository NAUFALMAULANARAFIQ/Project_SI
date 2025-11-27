<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perhitungan_Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_perhitungan',
        'id_kriteria',
        'bobot',
        'id_mhs',
        'id_mp'
    ];

    public function perhitungan()
    {
        return $this->belongsTo(Perhitungan::class, 'id_perhitungan');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }
}
