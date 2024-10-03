<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailIntervensi extends Model
{
    use HasFactory;

    protected $table = 'detail_intervensi';


    public function intervensiBPAS()
    {
        return $this->hasOne(intervensiBPAS::class,'id','INTERVENSIBPAS_ID');
    }
}
