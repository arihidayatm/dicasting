<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stunting extends Model
{
    use HasFactory;
    protected $table = 'stuntings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NIK',
        'KELUARGA_ID',
        'NAMA_BALITA',
        'TGL_LAHIR',
        'JENIS_KELAMIN',
        'BERAT_BADAN',
        'TINGGI_BADAN',
        'sumber_data', // Tambahkan kolom sumber_data
        'tgl_pengukuran', // Tambahkan kolom tgl_pengukuran
    ];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'KELUARGA_ID', 'id');
    }
}
