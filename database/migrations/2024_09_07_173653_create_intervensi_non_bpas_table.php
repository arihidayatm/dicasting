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
        Schema::create('intervensi_non_bpas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('USER_ID')->references('id')->on('users');
            // $table->foreignId('INTERVENSI_ID')->references('id')->on('intervensi');
            $table->foreignId('BENTUK_INTERVENSI_ID')->references('id')->on('bentuk_intervensis');
            $table->foreignId('STUNTING_ID')->references('id')->on('stuntings');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intervensi_non_bpas');
    }
};
