<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    protected $table = 'keluarga';
    protected $primarykey = 'ID';
    protected $fillable = [
        'NO_KK',
        'NIK_AYAH',
        'NAMA_AYAH',
        'NIK_IBU',
        'NAMA_IBU',
        'ALAMAT',
        'RT',
        'RW',
        'KABUPATENKOTA_ID',
        'KECAMATAN_ID',
        'KELURAHANDESA_ID',
        'KODE_POS',
        'NOHP',
    ];

    public function balita()
    {
        return $this->hasMany(Balita::class,'ID','KELUARGA_ID');
    }

    public function kabupatenkota()
    {
        return $this->hasMany(Kabupatenkota::class, 'ID', 'KABUPATENKOTA_ID');
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'ID', 'KECAMATAN_ID');
    }

    public function kelurahandesa()
    {
        return $this->hasMany(Kelurahandesa::class, 'ID', 'KELURAHANDESA_ID');
    }

    public function stuntings()
    {
        return $this->hasMany(Stunting::class,'KELUARGA_ID','ID');
    }
}
