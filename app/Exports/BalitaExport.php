<?php

namespace App\Exports;

use App\Models\Balita;
// use Maatwebsite\Excel\Concerns\FromCollection;
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
            $balita->NO_KK,
            $balita->ANAK_KE,
            $balita->NAMA_BALITA,
            $balita->TGL_LAHIR,
            $balita->JENIS_KELAMIN,
            $balita->NAMA_ORANGTUA,
            $balita->ALAMAT,
            $balita->RT,
            $balita->RW,
            $balita->kabupatenkota->NAMA_KABKOTA,
            $balita->kecamatan->NAMA_KECAMATAN,
            $balita->puskesmas->NAMA_PUSKESMAS,
            $balita->kelurahandesa->NAMA_KELURAHANDESA,
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
            'NAMA ORANGTUA',
            'ALAMAT',
            'RT',
            'RW',
            'KABUPATENKOTA',
            'KECAMATAN',
            'PUSKESMAS',
            'KELURAHAN',
        ];
    }

}
