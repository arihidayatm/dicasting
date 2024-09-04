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
        'ID',
        'KABUPATENKOTA_ID',
        'ID_KECAMATAN_BPS',
        'NAMA_KECAMATAN',
    ];

    public function stuntings()
    {
        return $this->hasMany(Stunting::class);
    }
}
