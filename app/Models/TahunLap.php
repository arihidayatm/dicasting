<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunLap extends Model
{
    use HasFactory;

    protected $table ='tahun_lap';
    protected $primaryKey ='id';
    protected $fillable =[
        'ID_TAHUN',
        'TAHUN'
    ];

    public function bulanLap()
    {
        $this->hasMany(BulanLap::class,'id','TAHUN_ID');
    }
}
