<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stunting extends Model
{
    use HasFactory;

    protected $table = 'stuntings';
    // protected $primaryKey = 'id';
    protected $guarded = [];

    public function kabupatenkota()
    {
        return $this->hasOne(Kabupatenkota::class,'ID','KABUPATENKOTA_ID');
    }

    public function kecamatan()
    {
        return $this->hasOne(Kecamatan::class,'ID','KECAMATAN_ID');
    }

    public function puskesmas()
    {
        return $this->hasOne(Puskesmas::class,'id','PUSKESMAS_ID');
    }

    public function kelurahandesa()
    {
        return $this->hasOne(Kelurahandesa::class,'ID','KELURAHANDESA_ID');
    }

    public function posyandu()
    {
        return $this->hasOne(Posyandu::class, 'id', 'POSYANDU_ID');
    }

    public static function getCountStunting($kecamatan)
    {
        return Stunting::where('kecamatan')
            ->where('kelurahandesa')
            ->select(DB::raw('count(id) AS data'))
            ->get();
    }

}
