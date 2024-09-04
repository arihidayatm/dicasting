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
        Schema::create('balita', function (Blueprint $table) {
            $table->id();
            $table->string('NIK')->nullable();
            $table->string('NO_KK')->nullable();
            $table->string('ANAK_KE');
            $table->string('NAMA_BALITA');
            $table->date('TGL_LAHIR');
            $table->enum('JENIS_KELAMIN', ['L', 'P']);
            $table->string('NAMA_ORANGTUA');
            $table->string('ALAMAT')->nullable();
            $table->integer('RT')->nullable();
            $table->integer('RW')->nullable();
            $table->foreignId('KABUPATENKOTA_ID')->references('id')->on('kabupatenkota');
            $table->foreignId('KECAMATAN_ID')->references('id')->on('kecamatan');
            $table->foreignId('PUSKESMAS_ID')->references('id')->on('puskesmas');
            $table->foreignId('KELURAHANDESA_ID')->references('id')->on('kelurahandesa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balita');
    }
};
