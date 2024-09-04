<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;

    protected $table = 'balita';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'NIK',
        'NO_KK',
        'NAMA_BALITA',
        'TGL_LAHIR',
        'JENIS_KELAMIN',
        'UMUR',
        'BERAT_BADAN',
        'TINGGI_BADAN',
        'NAMA_ORANGTUA',
        'ALAMAT',
        'KECAMATAN_ID',
        'KELURAHANDESA_ID',
        'PUSKESMAS_ID',
        'POSYANDU_ID',
    ];

    public function kabupatenkota()
    {
        return $this->hasOne(Kabupatenkota::class,'ID','KABUPATENKOTA_ID');
    }

    public function kecamatan()
    {
        return $this->hasOne(Kecamatan::class,'ID','KECAMATAN_ID');
    }

    public function kelurahandesa()
    {
        return $this->hasOne(Kelurahandesa::class,'ID','KELURAHANDESA_ID');
    }

    public function puskesmas()
    {
        return $this->hasOne(Puskesmas::class,'id','PUSKESMAS_ID');
    }

    public function posyandu()
    {
        return $this->hasOne(Posyandu::class,'ID','POSYANDU_ID');
    }

}
