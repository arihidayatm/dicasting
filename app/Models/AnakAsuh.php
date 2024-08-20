<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakAsuh extends Model
{
    use HasFactory;

    protected $fillable = [
        'bapak_asuh_id',
        'nama_anak_asuh',
        'alamat',
        'kecamatan_id',
        'kelurahan_id',
        'keterangan',
    ];

    public function bapakAsuh()
    {
        return $this->belongsTo(BapakAsuh::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(KelurahanDesa::class);
    }
}
