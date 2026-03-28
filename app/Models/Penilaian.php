<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $primaryKey = 'id_penilaian';

    protected $fillable = [
        'id_user',
        'id_mp',
        'id_kriteria',
        'nilai'
    ];

    // --- RELASI (Opsional tapi sangat berguna nanti) ---

    // Mengambil data Matakuliah dari penilaian ini
    public function matakuliah()
    {
        return $this->belongsTo(Mk_Plhn::class, 'id_mp', 'id_mp');
    }

    // Mengambil data User penilai
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Mengambil data Kriteria
    public function kriteria()
    {
        // Sesuaikan parameter ke-3 dengan PK tabel kriteria (id atau id_kriteria)
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id_kriteria');
    }
}
