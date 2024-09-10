<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ePPGBM extends Model
{
    use HasFactory;

    protected $table ='';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'TAHUN_ID',
        'BULAN_ID',
        'STUNTING_ID',
        'TGL_UPLOAD',
        
    ];
}
