<?php

use App\Models\Kabupatenkota;
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
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->bigInteger('ID')->primary();
            $table->foreignId('KABUPATENKOTA_ID')->references('ID')->on('kabupatenkota');
            $table->string('ID_KECAMATAN_BPS', 100);
            $table->string('NAMA_KECAMATAN', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecamatan');
    }
};
