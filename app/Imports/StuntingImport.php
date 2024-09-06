<?php

namespace App\Imports;

use App\Models\Posyandu;
use App\Models\Stunting;
use App\Models\Kecamatan;
use App\Models\Kelurahandesa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StuntingImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $kecamatan = Kecamatan::where('kecamatan', $row['kecamatan'])->first();
            $kelurahan = Kelurahandesa::where('kelurahan_desa', $row['kelurahan_desa'])->first();
            $posyandu = Posyandu::where('posyandu', $row['posyandu'])->first();
            Stunting::create([
                'kecamatan' => $kecamatan->id,
                'kelurahan_desa' => $kelurahan->id,
                'posyandu' => $posyandu->id,
                'stunting' => $row['stunting'],
            ]);

        }
    }
}

