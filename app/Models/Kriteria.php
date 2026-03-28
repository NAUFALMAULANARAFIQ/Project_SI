<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $fillable = [
        'nama_kriteria',
        'cost_benefit',
        'bobot',
    ];

    public function perhitunganDetails()
    {
        return $this->hasMany(Perhitungan_Detail::class, 'id_kriteria');
    }
}
