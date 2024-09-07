<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $primarykey = 'ID';
    protected $fillable = [
        'ID',
        'KABUPATENKOTA_ID',
        'ID_KECAMATAN_BPS',
        'NAMA_KECAMATAN',
    ];

    public function stuntings()
    {
        return $this->hasMany(Stunting::class);
    }

    public function puskesmas()
    {
        return $this->hasMany(Puskesmas::class);
    }

    public function posyandu()
    {
        return $this->hasMany(Posyandu::class);
    }

    public function bapakasuh()
    {
        return $this->hasMany(BapakAsuh::class);
    }

}
