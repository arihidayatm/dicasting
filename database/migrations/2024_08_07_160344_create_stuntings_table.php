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
        Schema::create('stuntings', function (Blueprint $table) {
            $table->ID();
            //nik
            $table->string('NIK')->required();
            //kecamatan relation from table kecamatan (NAMA_KECAMATAN)
            $table->foreignId('KECAMATAN_ID')->references('NAMA_KECAMATAN')->on('kecamatan');
            //Nama Balita
            $table->string('NAMA_BALITA', 100)->required();
            //tgl lahir 2024-08-07
            $table->date('TGL_LAHIR',0)->required();
            //Jenis Kelamin, L = laki-laki, P = perempuan
            $table->enum('JENIS_KELAMIN', ['L', 'P'])->required();
            //BB lahir default Kilogram
            $table->string('BERAT_BADAN', 10)->required();
            //TB lahir default Centimeter
            $table->string('TINGGI_BADAN', 10)->required();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stuntings');
    }
};
