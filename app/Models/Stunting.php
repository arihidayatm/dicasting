<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stunting extends Model
{
    use HasFactory;
    protected $table = 'stuntings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NIK',
        'NO_KK', // Ganti KELUARGA_ID dengan NO_KK
        'NAMA_BALITA',
        'TGL_LAHIR',
        'JENIS_KELAMIN',
        'BERAT_BADAN',
        'TINGGI_BADAN',
        'NAMA_ORANGTUA',
        'ALAMAT',
        'sumber_data', // Tambahkan kolom sumber_data
        'tgl_pengukuran', // Tambahkan kolom tgl_pengukuran
    ];

    // Hapus relasi keluarga
    // public function keluarga()
    // {
    //     return $this->belongsTo(Keluarga::class, 'KELUARGA_ID', 'id');
    // }

}
