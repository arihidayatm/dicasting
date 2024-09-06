<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    use HasFactory;

    protected $table = 'puskesmas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'ID_PUSKESMAS',
        'NAMA_PUSKESMAS',
        'KABUPATENKOTA_ID',
        'KECAMATAN_ID',
        'created_at',
        'updated_at',
    ];

    public function Kabupatenkota()
    {
        return $this->hasOne(Kabupatenkota::class, 'ID','KABUPATENKOTA_ID');
    }

    public function Kecamatan()
    {
        return $this->hasOne(Kecamatan::class, 'ID', 'KECAMATAN_ID');
    }

    public function Balita()
    {
        return $this->hasMany(Balita::class, 'id', 'BALITA_ID');
    }

}
