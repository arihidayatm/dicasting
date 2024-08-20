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
        // 'ID',
        'KABUPATENKOTA_ID',
        'ID_KECAMATAN_BPS',
        'NAMA_KECAMATAN',
    ];

    public function kabupatenkota()
    {
        return $this->belongsTo(Kabupatenkota::class, 'KABUPATENKOTA_ID', 'ID');
    }

    public function kelurahandesa()
    {
        return $this->hasMany(Kelurahandesa::class, 'KECAMATAN_ID', 'ID');
    }
}
