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
        Schema::create('keluarga', function (Blueprint $table) {
            $table->bigInteger('ID');
            $table->bigInteger('NO_KK', 16)->primary();
            $table->string('NIK_AYAH')->nullable();
            $table->string('NAMA_AYAH', 100)->required();
            $table->string('NIK_IBU')->nullable();
            $table->string('NAMA_IBU', 100)->required();
            $table->string('ALAMAT', 500);
            $table->string('RTRW')->nullable();
            $table->foreignId('KABUPATENKOTA_ID')->references('ID')->on('kabupatenkota');
            $table->foreignId('KECAMATAN_ID')->references('ID')->on('kecamatan');
            $table->foreignId('KELURAHANDESA_ID')->references('ID')->on('kelurahandesa');
            $table->string('KODE_POS')->nullable();
            $table->string('STATUS_PERKAWINAN', 1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluarga');
    }
};
