<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahandesa extends Model
{
    use HasFactory;
    protected $table = 'kelurahandesa';
    protected $primaryKey = 'ID';
    protected $fillable =[
        // 'ID',
        'KECAMATAN_ID',
        'NAMA_KELURAHANDESA',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'KECAMATAN_ID', 'ID');
    }

    public function keluarga()
    {
        return $this->hasMany(Keluarga::class, 'KECAMATAN_ID', 'ID');
    }

    public function stunting()
    {
        return $this->hasMany(Stunting::class, 'KECAMATAN_ID', 'ID');
    }
}
