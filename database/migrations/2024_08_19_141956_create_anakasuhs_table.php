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
        Schema::create('anak_asuhs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bapak_asuh_id')->constrained('bapak_asuhs');
            $table->string('nama_anak_asuh');
            $table->string('alamat', 500);
            $table->foreignId('kecamatan_id')->constrained('kecamatan');
            $table->foreignId('kelurahan_id')->constrained('kelurahandesa');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anak_asuhs');
    }
};
