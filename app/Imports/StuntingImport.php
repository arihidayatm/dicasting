<?php

namespace App\Imports;

use App\Models\Kecamatan;
use App\Models\Keluarga;
use App\Models\Kelurahandesa;
use App\Models\Stunting;
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
            $keluarga = Keluarga::where('no_kk', $row['no_kk'])->first();
            $kecamatan = Kecamatan::where('ID', $keluarga['kecamatan_id'])->first();
            $kelurahandesa = Kelurahandesa::where('ID', $keluarga['kelurahandesa_id'])->first();

            if (!$keluarga) {
                Stunting::create([
                    'nik' => $row['nik'],
                    'no_kk' => $keluarga['no_kk'],
                    'nama_balita' => $row['nama_balita'],
                    'tgl_lahir' => $row['tgl_lahir'],
                    'jenis_kelamin' => $row['jenis_kelamin'],
                    // 'umur' => $row['umur'],
                    'berat_badan' => $row['berat_badan'],
                    'tinggi_badan' => $row['tinggi_badan'],
                    // 'nama_ortu' => $keluarga['nama_ortu'],
                    // 'no_kk' => $row['alamat'],
                    // 'kecamatan_id' => $row['nama_kecamatan'],
                    // 'kelurahandesa_id' => $row['nama_kelurahandesa'],
                    // 'status_tbu' => $row['status_tbu'],
                ]);
            }
        }
    }
}