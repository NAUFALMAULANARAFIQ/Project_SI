<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id('id_penilaian'); // Primary Key tabel ini

            // 1. Relasi ke User (Siapa yang menilai?)
            // Pastikan tipe data sama dengan id_user di tabel users (biasanya bigInteger unsigned)
            $table->unsignedBigInteger('id_user');

            // 2. Relasi ke Matakuliah (Apa yang dinilai?)
            $table->unsignedBigInteger('id_mp');

            // 3. Relasi ke Kriteria (Berdasarkan apa?)
            $table->unsignedBigInteger('id_kriteria');

            // 4. Nilai Skor (1, 2, 3, 4, 5)
            // Pakai double biar aman kalau ada nilai koma, tapi integer juga oke
            $table->double('nilai');

            $table->timestamps();

            // --- DEFINISI FOREIGN KEY (Agar datanya konsisten) ---
            // Saat user/mk/kriteria dihapus, nilai ini ikut terhapus (cascade)

            // Asumsi tabel user primary key-nya 'id_user'
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');

            // Asumsi tabel mk_plhn primary key-nya 'id_mp'
            $table->foreign('id_mp')->references('id_mp')->on('mk_plhn')->onDelete('cascade');

            // Asumsi tabel kriteria primary key-nya 'id_kriteria' (atau 'id')
            // Cek database kamu, kalau PK kriteria namanya 'id', ganti 'id_kriteria' yg di references jadi 'id'
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
};
