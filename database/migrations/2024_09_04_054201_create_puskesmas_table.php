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
        Schema::create('puskesmas', function (Blueprint $table) {
            $table->id();
            $table->string('ID_PUSKESMAS');
            $table->string('NAMA_PUSKESMAS');
            $table->foreignId('KABUPATENKOTA_ID')->references('id')->on('kabupatenkota');
            $table->foreignId('KECAMATAN_ID')->references('id')->on('kecamatan');
            $table->string('ALAMAT_PUSKESMAS')->nullable();
            $table->string('NOTELP_PUSKESMAS')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puskesmas');
    }
};
