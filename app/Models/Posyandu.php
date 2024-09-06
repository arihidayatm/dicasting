<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    use HasFactory;
    protected $table = 'posyandu';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ID_POSYANDU',
        'NAMA_POSYANDU',
        'KABUPATENKOTA_ID',
        'KECAMATAN_ID',
        'PUSKESMAS_ID',
        'KELURAHANDESA_ID',
    ];

    public function puskesmas()
    {
        return $this->hasOne(Puskesmas::class,'id','PUSKESMAS_ID');
    }
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

    public function stunting()
    {
        return $this->hasOne(Stunting::class,'id','POSYANDU_ID');
    }


}
