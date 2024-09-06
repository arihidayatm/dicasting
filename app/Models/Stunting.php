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
        'RT',
        'RW',
        'KECAMATAN_ID',
        'KELURAHANDESA_ID',
        'POSYANDU_ID',
    ];

    public function kecamatan()
    {
        return $this->hasOne(Kecamatan::class,'ID','KECAMATAN_ID');
    }

    public function kelurahandesa()
    {
        return $this->hasOne(Kelurahandesa::class,'ID','KELURAHANDESA_ID');
    }

    public function posyandu()
    {
        return $this->hasOne(Posyandu::class, 'id', 'POSYANDU_ID');
    }

}
