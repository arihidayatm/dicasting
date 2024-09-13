<?php

namespace App\Imports;

use App\Models\Balita;
use App\Models\Kecamatan;
use App\Models\Puskesmas;
use App\Models\Kabupatenkota;
use App\Models\Kelurahandesa;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BalitaImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            if (isset($row['kabupatenkota'])) {
                $kabupatenkota = Kabupatenkota::where('NAMA_KABKOTA', $row['kabupatenkota'])->first();
            } else {
                // Handle kesalahan jika key "kabupatenkota" tidak ditemukan
                // Misalnya, Anda dapat menambahkan log error atau mengirimkan notifikasi
                Log::error('Key "kabupatenkota" tidak ditemukan dalam array $row');
                continue;
            }

            if (isset($row['kecamatan'])) {
                $kecamatan = Kecamatan::where('NAMA_KECAMATAN', $row['kecamatan'])->first();
            } else {
                // Handle kesalahan jika key "kecamatan" tidak ditemukan
                Log::error('Key "kecamatan" tidak ditemukan dalam array $row');
                continue;
            }

            if (isset($row['kelurahandesa'])) {
                $kelurahandesa = Kelurahandesa::where('NAMA_KELURAHANDESA', $row['kelurahandesa'])->first();
            } else {
                // Handle kesalahan jika key "kelurahandesa" tidak ditemukan
                Log::error('Key "kelurahandesa" tidak ditemukan dalam array $row');
                continue;
            }

            if (isset($row['puskesmas'])) {
                $puskesmas = Puskesmas::where('NAMA_PUSKESMAS', $row['puskesmas'])->first();
            } else {
                // Handle kesalahan jika key "puskesmas" tidak ditemukan
                Log::error('Key "puskesmas" tidak ditemukan dalam array $row');
                continue;
            }
            // $kabupatenkota = Kabupatenkota::where('NAMA_KABKOTA', $row['kabupatenkota'])->first();
            // $kecamatan = Kecamatan::where('NAMA_KECAMATAN', $row['kecamatan'])->first();
            // $kelurahandesa = Kelurahandesa::where('NAMA_KELURAHANDESA', $row['kelurahandesa'])->first();
            // $puskesmas = Puskesmas::where('NAMA_PUSKESMAS', $row['puskesmas'])->first();
            if($kabupatenkota && $kecamatan && $kelurahandesa && $puskesmas){
                $balita = Balita::where('nik', $row['nik'])->first();
                if(!$balita) {
                Balita::create([
                    'NIK' => $row['nik'],
                    'NO_KK' => $row['no_kk'],
                    'ANAK_KE' => $row['anak_ke'],
                    'NAMA_BALITA' => $row['nama_balita'],
                    'TGL_LAHIR' => $row['tgl_lahir'],
                    'JENIS_KELAMIN' => $row['jenis_kelamin'],
                    'NAMA_ORANGTUA' => $row['nama_orangtua'],
                    'ALAMAT' => $row['alamat'],
                    'RT' => $row['rt'],
                    'RW' => $row['rw'],
                    'KABUPATENKOTA_ID' => $kabupatenkota['id'],
                    'KECAMATAN_ID' => $kecamatan['id'],
                    'KELURAHANDESA_ID' => $kelurahandesa['id'],
                    'PUSKESMAS_ID' => $puskesmas['id'],
                ]);
                }
            }

        }
    }
}

