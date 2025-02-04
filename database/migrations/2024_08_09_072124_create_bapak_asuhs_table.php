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
        Schema::create('bapak_asuh', function (Blueprint $table) {
            $table->ID();
            $table->string('NIK_ORANGTUAASUH', 16)->required();
            $table->string('NAMA_ORANGTUAASUH')->required();
            $table->string('ALAMAT', 500);
            $table->foreignId('KABUPATENKOTA_ID')->references('ID')->on('kabupatenkota');
            $table->foreignId('KECAMATAN_ID')->references('ID')->on('kecamatan');
            $table->foreignId('KELURAHANDESA_ID')->references('ID')->on('kelurahandesa');
            $table->string('NOHP');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bapak_asuh');
    }
};
