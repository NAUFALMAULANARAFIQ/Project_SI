<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    use HasFactory;
    protected $table = 'perhitungan';
    protected $primaryKey = 'id_perhitungan';
    protected $fillable = [
        'id_user',
        'id_mp',
        'hasil',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function mkPlhn()
    {
        return $this->belongsTo(Mk_Plhn::class, 'id_mp');
    }

    public function details()
    {
        return $this->hasMany(Perhitungan_Detail::class, 'id_perhitungan');
    }
}
