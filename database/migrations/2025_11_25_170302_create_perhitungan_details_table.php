<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perhitungan_details', function (Blueprint $table) {
            $table->id('id_pdetail');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_mp');
            $table->unsignedBigInteger('id_perhitungan');
            $table->unsignedBigInteger('id_kriteria');
            $table->integer('bobot');

            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_mp')->references('id_mp')->on('mk_plhn')->onDelete('cascade');
            $table->foreign('id_kriteria')->references('id_kriteria')->on('kriteria')->onDelete('cascade');
            $table->foreign('id_perhitungan')->references('id_perhitungan')->on('perhitungan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perhitungan_details');
    }
};
