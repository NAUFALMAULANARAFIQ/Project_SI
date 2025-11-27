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
        Schema::create('perhitungan', function (Blueprint $table) {
            $table->id('id_perhitungan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_mp');
            $table->float('hasil')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_mp')->references('id_mp')->on('mk_plhn')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perhitungan');
    }
};
