<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepentingan extends Model
{
    use HasFactory;

    protected $table = 'kepentingan';

    protected $fillable = [
        'nama_bobot',
        'bobot',
    ];
}
