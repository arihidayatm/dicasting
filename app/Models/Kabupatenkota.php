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

    public function Balita()
    {
        return $this->hasMany(Balita::class,'ID','KABUPATENKOTA_ID');
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
