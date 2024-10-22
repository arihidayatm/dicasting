<?php

namespace App\Imports;

use App\Models\Stunting;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StuntingImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Stunting([
            'NIK' => trim($row[1]),
            'NO_KK' => trim($row[2]),
            'NAMA_BALITA' => $row[3],
            'TGL_LAHIR' => trim($row[4]),
            'JENIS_KELAMIN' => $row[5],
            'BERAT_BADAN' => $row[6],
            'TINGGI_BADAN' => $row[7],
            'NAMA_ORANGTUA' => $row[8],
            'ALAMAT' => $row[9],
            'RT' => $row[10],
            'RW' => $row[11],
            'KECAMATAN' => $row[12],
            'PUSKESMAS' => $row[13],
            'KELURAHANDESA' => $row[14],
            'POSYANDU' => $row[15],
            'STATUS_TBU' => $row[16],
            'ZS_TBU' => $row[17],
        ]);
    }
}

