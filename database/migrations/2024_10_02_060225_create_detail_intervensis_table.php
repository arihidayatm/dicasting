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
        Schema::create('detail_intervensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('INTERVENSIBPAS_ID')->references('id')->on('intervensi_bpas');
            $table->date('TGL_INTERVENSI');
            $table->string('FOTO_ANAK');
            $table->string('DOKUMENTASI');
            $table->enum('ANGGARAN', ['APBD', 'NON APBD','LAINNYA']);
            $table->string('KETERANGAN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_intervensi');
    }
};
