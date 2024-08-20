<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BentukIntervensi extends Model
{
    use HasFactory;

    protected $table = 'bentuk_intervensis';
    // protected $primarykey = 'id';
    protected $fillable =[
        // 'ID',
        'INTERVENSI_ID',
        'BENTUK_INTERVENSI',
        'KETERANGAN',
    ];

    public function Intervensi()
    {
        return $this->belongsTo(JenisIntervensi::class, 'INTERVENSI_ID');
    }

}
