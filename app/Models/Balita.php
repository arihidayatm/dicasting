<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Balita extends Model
{
    use HasFactory;

    protected $table = 'balita';
    // protected $primaryKey = 'id';
    protected $guarded = [];

    public $timestamps = false;

    public static function get()
    {
        return static::all();
    }

    // public function keluarga()
    // {
    //     return $this->hasOne(Keluarga::class,'ID','KELUARGA_ID');
    // }

    // public function kabupatenkota()
    // {
    //     return $this->hasOne(Kabupatenkota::class,'ID','KABUPATENKOTA_ID');
    // }

    // public function kecamatan()
    // {
    //     return $this->hasOne(Kecamatan::class,'ID','KECAMATAN_ID');
    // }

    // public function kelurahandesa()
    // {
    //     return $this->hasOne(Kelurahandesa::class,'ID','KELURAHANDESA_ID');
    // }

    // public function puskesmas()
    // {
    //     return $this->hasOne(Puskesmas::class,'id','PUSKESMAS_ID');
    // }

    // public function posyandu()
    // {
    //     return $this->hasOne(Posyandu::class,'ID','POSYANDU_ID');
    // }

    // public function collection(Collection $rows)
    // {
    //     foreach ($rows as $row)
    //     {
    //         if (isset($row['kabupatenkota'])) {
    //             $kabupatenkota = Kabupatenkota::where('NAMA_KABKOTA', $row['kabupatenkota'])->first();
    //         } else {
    //             // Handle kesalahan jika key "kabupatenkota" tidak ditemukan
    //             // Misalnya, Anda dapat menambahkan log error atau mengirimkan notifikasi
    //             Log::error('Key "kabupatenkota" tidak ditemukan dalam array $row');
    //             continue;
    //         }
    //         if (isset($row['kecamatan'])) {
    //             $kecamatan = Kecamatan::where('NAMA_KECAMATAN', $row['kecamatan'])->first();
    //         } else {
    //             // Handle kesalahan jika key "kecamatan" tidak ditemukan
    //             Log::error('Key "kecamatan" tidak ditemukan dalam array $row');
    //             continue;
    //         }
    //         if (isset($row['kelurahandesa'])) {
    //             $kelurahandesa = Kelurahandesa::where('NAMA_KELURAHANDESA', $row['kelurahandesa'])->first();
    //         } else {
    //             // Handle kesalahan jika key "kelurahandesa" tidak ditemukan
    //             Log::error('Key "kelurahandesa" tidak ditemukan dalam array $row');
    //             continue;
    //         }
    //         if (isset($row['puskesmas'])) {
    //             $puskesmas = Puskesmas::where('NAMA_PUSKESMAS', $row['puskesmas'])->first();
    //         } else {
    //             // Handle kesalahan jika key "puskesmas" tidak ditemukan
    //             Log::error('Key "puskesmas" tidak ditemukan dalam array $row');
    //             continue;
    //         }
    //         if($kabupatenkota && $kecamatan && $kelurahandesa && $puskesmas){
    //             Balita::create([
    //                 'NIK' => $row['nik'],
    //                 'NO_KK' => $row['no_kk'],
    //                 'NAMA_BALITA' => $row['nama_balita'],
    //                 'TGL_LAHIR' => $row['tgl_lahir'],
    //                 'JENIS_KELAMIN' => $row['jenis_kelamin'],
    //                 // 'UMUR' => $row['umur'],
    //                 'BERAT_BADAN' => $row['berat_badan'],
    //                 'TINGGI_BADAN' => $row['tinggi_badan'],
    //                 'NAMA_ORANGTUA' => $row['nama_orangtua'],
    //                 'ALAMAT' => $row['alamat'],
    //                 'KECAMATAN_ID' => $kecamatan['id'],
    //                 'KELURAHANDESA_ID' => $kelurahandesa['id'],
    //                 'PUSKESMAS_ID' => $puskesmas['id'],
    //                 'KABUPATENKOTA_ID' => $kabupatenkota['id'],
    //             ]);
    //         }
    //         //simpan data ke table balita
    //         $balita = new Balita();
    //         $balita->NIK = $row['nik'];
    //         $balita->NO_KK = $row['no_kk'];
    //         $balita->NAMA_BALITA = $row['nama_balita'];
    //         $balita->TGL_LAHIR = $row['tgl_lahir'];
    //         $balita->JENIS_KELAMIN = $row['jenis_kelamin'];
    //         // $balita->UMUR = $row['umur'];
    //         $balita->BERAT_BADAN = $row['berat_badan'];
    //         $balita->TINGGI_BADAN = $row['tinggi_badan'];
    //         $balita->NAMA_ORANGTUA = $row['nama_orangtua'];
    //         $balita->ALAMAT = $row['alamat'];
    //         $balita->KECAMATAN_ID = $kecamatan->id;
    //         $balita->KELURAHANDESA_ID = $kelurahandesa->id;
    //         $balita->PUSKESMAS_ID = $puskesmas->id;
    //         $balita->KABUPATENKOTA_ID = $kabupatenkota->id;
    //         $balita->save();
    //     }
    // }

}
