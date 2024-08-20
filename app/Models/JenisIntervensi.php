<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisIntervensi extends Model
{
    use HasFactory;
    protected $table = 'intervensi';
    // protected $primarykey = 'id';
    protected $fillable = [
        // 'ID',
        'JENIS_INTERVENSI',
        'KET_INTERVENSI',
    ];

    public function BentukIntervensi()
    {
        return $this->hasMany(BentukIntervensi::class, 'INTERVENSI_ID', 'id');
    }
}
