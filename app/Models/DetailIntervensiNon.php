<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailIntervensiNon extends Model
{
    use HasFactory;

    protected $table =['detail_intervensinon'];

    protected $guarded = [];

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