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
        Schema::create('posyandu', function (Blueprint $table) {
            $table->id();
            $table->string('ID_POSYANDU');
            $table->string('NAMA_POSYANDU');
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
        Schema::dropIfExists('posyandu');
    }
};
