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
        return $this->hasOne(Kabupatenkota::class,'id','KABUPATENKOTA_ID');
    }

    public function kecamatan()
    {
        return $this->hasOne(Kecamatan::class,'id','KECAMATAN_ID');
    }
    public function kelurahanDesa()
    {
        return $this->hasOne(KelurahanDesa::class,'id','KELURAHANDESA_ID');
    }

}
