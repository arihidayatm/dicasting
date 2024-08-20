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
        Schema::create('bentuk_intervensis', function (Blueprint $table) {
            $table->ID();
            $table->foreignId('INTERVENSI_ID')->references('ID')->on('intervensi');
            $table->string('BENTUK_INTERVENSI', 100)->required();
            $table->string('KETERANGAN', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bentuk_intervensis');
    }
};
