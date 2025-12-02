<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mk_Plhn extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_mp';
    protected $table = 'mk_plhn';

    protected $fillable = [
        'kode_mp',
        'nama_mp',
        'semester',
    ];

    public function perhitungan()
    {
        return $this->hasMany(Perhitungan::class, 'id_mp');
    }
}
