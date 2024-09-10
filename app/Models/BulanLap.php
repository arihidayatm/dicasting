<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulanLap extends Model
{
    use HasFactory;

    protected $table ='bulan_lap';
    protected $primaryKey ='id';
    protected $fillable =[
        'TAHUN_ID',
        'BULAN'
    ];

    public function tahunLap()
    {
        $this->hasOne(TahunLap::class,'id','TAHUN_ID');
    }
}
