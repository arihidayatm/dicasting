<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BapakAsuh extends Model
{
    use HasFactory;

    protected $fillable = [
        'NIK_ORANGTUAASUH',
        'NAMA_ORANGTUAASUH',
        'ALAMAT',
        'KABUPATENKOTA_ID',
        'KECAMATAN_ID',
        'KELURAHANDESA_ID',
        'NOHP',
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
}
