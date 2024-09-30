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
        Schema::create('non_bapak_asuhs', function (Blueprint $table) {
            $table->id();
            $table->string('KODE_NONORANGTUAASUH')->required();
            $table->string('NAMA_NONORANGTUAASUH')->required();
            $table->string('ALAMAT', 500)->nullable();
            $table->string('NOHP')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_bapak_asuhs');
    }
};
