<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntervensiNonBPAS extends Model
{
    use HasFactory;
    protected $table = 'intervensi_non_bpas';
    // protected $primaryKey = 'id';
    protected $fillable = [
        'USER_ID',
        'STUNTING_ID',
        'BENTUK_INTERVENSI_ID',
        'STATUS'
    ];

    public function user()
    {
        return $this->hasOne(User::class,  'id','USER_ID');
    }

    public function bentukintervensi()
    {
        return $this->hasOne(BentukIntervensi::class, 'id','BENTUK_INTERVENSI_ID');
    }

    public function stunting()
    {
        return $this->hasOne(Stunting::class, 'id','STUNTING_ID');
    }

    public function kabupatenkota()
    {
        return $this->hasOne(Kabupatenkota::class,'ID','KABUPATENKOTA_ID');
    }

    public function kecamatan()
    {
        return $this->hasOne(Kecamatan::class,'ID','KECAMATAN_ID');
    }

    public function kelurahandesa()
    {
        return $this->hasOne(Kelurahandesa::class,'ID','KELURAHANDESA_ID');
    }
}
