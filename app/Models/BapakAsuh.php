<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BapakAsuh extends Model
{
    use HasFactory;

    protected $fillable = ['NIK_ORANGTUAASUH', 'NAMA_ORANGTUAASUH', 'ALAMAT', 'KABUPATEN_ID', 'KECAMATAN_ID', 'KELURAHANDESA_ID', 'NOHP'];

    public function kabupatenkota()
    {
        return $this->belongsTo(Kabupatenkota::class, 'KABUPATEN_ID');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'KECAMATAN_ID');
    }

    public function kelurahandesa()
    {
        return $this->belongsTo(Kelurahandesa::class, 'KELURAHANDESA_ID');
    }
}
