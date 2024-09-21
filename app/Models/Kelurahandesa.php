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
        'ID',
        'KECAMATAN_ID',
        'NAMA_KELURAHANDESA',
    ];

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'ID','KECAMATAN_ID');
    }
    
    public function stuntings()
    {
        return $this->hasMany(Stunting::class, 'ID','KELURAHANDESA_ID');
    }
}
