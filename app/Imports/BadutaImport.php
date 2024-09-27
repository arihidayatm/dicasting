<?php

namespace App\Imports;

use App\Models\Balita;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BadutaImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function __construct()
    {
        Balita::truncate();
    }

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Balita([
            'NIK' => trim($row[1]),
            'KELUARGA_ID' => trim($row[2]),
            'ANAK_KE' => $row[3],
            'NAMA_BALITA' => $row[4],
            'JENIS_KELAMIN' => $row[5],
            'TGL_LAHIR' => trim($row[6]),
            'NAMA_AYAH' => $row[7],
            'NAMA_IBU' => $row[8],
            'ALAMAT' => $row[9],
            'RT' => $row[10],
            'RW' => $row[11],
            'KECAMATAN' => $row[12],
            'PUSKESMAS' => $row[13],
            'KELURAHANDESA' => $row[14],
            'POSYANDU' => $row[15],
        ]);
    }
}
