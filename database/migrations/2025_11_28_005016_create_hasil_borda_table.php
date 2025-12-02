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
        Schema::create('hasil_borda', function (Blueprint $table) {
            $table->id('id_borda');
            $table->unsignedBigInteger('id_mp'); 
            $table->integer('total_poin');
            $table->integer('ranking');
            $table->timestamps();

            $table->foreign('id_mp')->references('id_mp')->on('mk_plhn')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_borda');
    }
};
