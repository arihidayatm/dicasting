<?php

namespace App\Exports;

use App\Models\Stunting;
// use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\FromView;
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
            $stunting->kelurahandesa->NAMA_KELURAHANDESA,
            $stunting->posyandu->NAMA_POSYANDU,
            $stunting->STATUS_BBU,
            $stunting->STATUS_TBU,
            $stunting->STATUS_BBTB
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
            'KELURAHANDESA',
            'POSYANDU',
            'STATUS_BBU',
            'STATUS_TBU',
            'STATUS_BBTB'
        ];
    }
}
