<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupatenkota extends Model
{
    use HasFactory;
    protected $table = 'kabupatenkota';
    protected $primarykey = 'ID';
    protected $fillable = [
        'ID',
        'NAMA_KABKOTA',
    ];

    public function Keluarga()
    {
        return $this->hasMany(Keluarga::class,'ID','KELUARGA_ID');
    }

    public function Kecamatan()
    {
        return $this->hasMany(Kecamatan::class,'ID','KECAMATAN_ID');
    }

    public function Kelurahan()
    {
        return $this->hasMany(Kelurahandesa::class,'ID','KELURAHANDESA_ID');
    }

    public function Balita()
    {
        return $this->hasMany(Balita::class,'ID','BALITA_ID');
    }

    public function Bapakasuh()
    {
        return $this->hasMany(BapakAsuh::class,'ID','KABUPATENKOTA_ID');
    }

    public function Stunting()
    {
        return $this->hasMany(Stunting::class,'ID','KABUPATENKOTA_ID');
    }

    public function IntervensiBPAS()
    {
        return $this->hasMany(IntervensiBPAS::class,'ID','KABUPATENKOTA_ID');
    }

    public function IntervensiNonBPAS()
    {
        return $this->hasMany(IntervensiNonBPAS::class,'ID','KABUPATENKOTA_ID');
    }

}
