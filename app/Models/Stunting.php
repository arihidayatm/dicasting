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
        'id',
        'NIK',
        'NO_KK', // Ganti KELUARGA_ID dengan NO_KK
        'NAMA_BALITA',
        'TGL_LAHIR',
        'JENIS_KELAMIN',
        'BERAT_BADAN',
        'TINGGI_BADAN',
        'NAMA_ORANGTUA',
        'ALAMAT',
        'KECAMATAN_ID',
        'KELURAHANDESA_ID',
        'sumber_data', // Tambahkan kolom sumber_data
        // 'tgl_pengukuran', // Tambahkan kolom tgl_pengukuran
        'updated_at',
    ];

    // Hapus relasi keluarga
    // public function keluarga()
    // {
    //     return $this->belongsTo(Keluarga::class, 'KELUARGA_ID', 'id');
    // }
    public function kecamatan()
    {
        return $this->hasOne(Kecamatan::class,'ID','KECAMATAN_ID');
    }

    public function kelurahandesa()
    {
        return $this->hasOne(Kelurahandesa::class,'ID','KELURAHANDESA_ID');
    }

}
