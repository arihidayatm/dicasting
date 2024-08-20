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
        Schema::create('kelurahandesa', function (Blueprint $table) {
            $table->bigInteger('ID')->primary();
            $table->foreignId('KECAMATAN_ID')->references('ID')->on('kecamatan');
            $table->string('ID_KELURAHAN_BPS', 100)->required();
            $table->string('NAMA_KELURAHANDESA', 100)->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelurahandesa');
    }
};
