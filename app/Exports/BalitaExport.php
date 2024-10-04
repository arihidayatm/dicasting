<?php

namespace App\Exports;

use App\Models\Balita;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BalitaExport implements FromQuery, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Balita::all();
    // }

    public function query()
    {
        return Balita::query();
    }

    public function map($balita): array
    {
        return [
            $balita->NIK,
            $balita->KELUARGA_ID,
            $balita->ANAK_KE,
            $balita->NAMA_BALITA,
            $balita->TGL_LAHIR,
            $balita->JENIS_KELAMIN,
            $balita->NAMA_AYAH,
            $balita->NAMA_IBU,
            $balita->ALAMAT,
            $balita->RT,
            $balita->RW,
            $balita->KECAMATAN,
            $balita->PUSKESMAS,
            $balita->KELURAHANDESA,
            $balita->POSYANDU,
        ];
    }

    public function headings(): array
    {
        return [
            'NIK',
            'NO.KK',
            'ANAK.KE',
            'NAMA BALITA',
            'TGL LAHIR',
            'JENIS KELAMIN',
            'NAMA AYAH',
            'NAMA IBU',
            'ALAMAT',
            'RT',
            'RW',
            'KECAMATAN',
            'PUSKESMAS',
            'KELURAHAN/DESA',
            'POSYANDU',
        ];
    }

}
