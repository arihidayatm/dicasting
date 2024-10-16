<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailIntervensi extends Model
{
    use HasFactory;

    protected $table = 'detail_intervensi';

    protected $guarded = [];

    // protected $fillable = [
    //     'INTERVENSIBPAS_ID',
    //     'INTERVENSINONBPAS_ID',
    //     'TGL_INTERVENSI',
    //     'FOTO_ANAK',
    //     'STATUS',
    //     'STUNTING_ID',
    //     'ANGGARAN',
    //     'DOKUMENTASI',
    //     'KETERANGAN',
    // ];


    public function intervensiBPAS()
    {
        return $this->hasOne(intervensiBPAS::class,'id','INTERVENSIBPAS_ID');
    }

    public function intervensiNonBPAS()
    {
        return $this->hasOne(intervensiNonBPAS::class,'id','INTERVENSINONBPAS_ID');
    }

    public function stunting()
    {
        return $this->hasOne(Stunting::class,'id','STUNTING_ID');
    }

    public function bentukIntervensi()
    {
        return $this->hasOne(BentukIntervensi::class,'id','BENTUK_INTERVENSI_ID');
    }
}
