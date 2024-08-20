<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupatenkota extends Model
{
    use HasFactory;
    protected $table = 'kabupatenkota';
    protected $primarykey = 'ID';
    protected $fillable = [
        // 'ID',
        'NAMA_KABKOTA',
    ];

    public function Kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'KABUPATENKOTA_ID','ID');
    }
}
