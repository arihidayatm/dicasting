<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('balita', function (Blueprint $table) {
            $table->id();
            $table->string('NIK')->default('');
            $table->string('NO_KK')->default('');
            $table->string('ANAK_KE')->default('');
            $table->string('NAMA_BALITA')->default('');
            $table->date('TGL_LAHIR');
            $table->enum('JENIS_KELAMIN', ['L', 'P']);
            $table->string('NAMA_ORANGTUA')->default('');
            $table->string('ALAMAT')->nullable()->default(null);
            $table->integer('RT')->default('000');
            $table->integer('RW')->default('000');
            $table->foreignId('KABUPATENKOTA_ID')->references('id')->on('kabupatenkota');
            $table->foreignId('KECAMATAN_ID')->references('id')->on('kecamatan');
            $table->foreignId('PUSKESMAS_ID')->references('id')->on('puskesmas');
            $table->foreignId('KELURAHANDESA_ID')->references('id')->on('kelurahandesa');
            // $table->timestamps();
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
