<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    protected $table = 'keluarga';
    protected $primarykey = 'NO_KK';
    protected $fillable = [
        'NIK_AYAH',
        'NAMA_AYAH',
        'NIK_IBU',
        'NAMA_IBU',
        'ALAMAT',
        'RTRW',
        'KABUPATENKOTA_ID',
        'KECAMATAN_ID',
        'KELURAHAN_ID',
        'KODE_POS',
        'STATUS_PERKAWINAN',
    ];

    public function balitas()
    {
        return $this->hasMany(Balita::class,'ID','KELUARGA_ID');
    }

    public function stuntings()
    {
        return $this->hasMany(Stunting::class,'KELUARGA_ID','ID');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'KECAMATAN_ID');
    }

    public function kabupatenkota()
    {
        return $this->belongsTo(Kabupatenkota::class, 'KABUPATENKOTA_ID');
    }

    public function kelurahandesa()
    {
        return $this->belongsTo(Kelurahandesa::class, 'KELURAHAN_ID');
    }

}
