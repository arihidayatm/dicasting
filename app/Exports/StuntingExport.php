<?php

namespace App\Exports;

use App\Models\Stunting;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StuntingExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function query()
    {
        return Stunting::query();
    }

    public function map($stunting): array
    {
        return [
            $stunting->NIK,
            $stunting->NO_KK,
            $stunting->NAMA_BALITA,
            $stunting->TGL_LAHIR,
            $stunting->JENIS_KELAMIN,
            // number_format(abs($stunting->UMUR)) . ' Bulan',
            $stunting->BERAT_BADAN . ' gram',
            $stunting->TINGGI_BADAN . ' cm',
            $stunting->NAMA_ORANGTUA,
            $stunting->ALAMAT,
            $stunting->RT,
            $stunting->RW,
            $stunting->kecamatan->NAMA_KECAMATAN,
            $stunting->puskesmas->NAMA_PUSKESMAS,
            $stunting->kelurahandesa->NAMA_KELURAHANDESA,
            $stunting->POSYANDU,
            $stunting->STATUS_TBU,
            $stunting->ZS_TBU,
            // $stunting->STATUS_BBU,
            // $stunting->STATUS_BBTB
        ];
    }

    public function headings(): array
    {
        return [
            'NIK',
            'NO_KK',
            'NAMA_BALITA',
            'TGL_LAHIR',
            'JENIS_KELAMIN',
            // 'UMUR',
            'BERAT_BADAN',
            'TINGGI_BADAN',
            'NAMA_ORANGTUA',
            'ALAMAT',
            'RT',
            'RW',
            'KECAMATAN',
            'PUSKESMAS',
            'KELURAHAN/DESA',
            'POSYANDU',
            'STATUS_TBU',
            'ZS_TBU',
            // 'STATUS_BBU',
            // 'STATUS_BBTB'
        ];
    }
}
