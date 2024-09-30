<?php

namespace App\Http\Controllers;

use App\Models\ePPGBM;
use App\Models\BulanLap;
use App\Models\Stunting;
use App\Models\TahunLap;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\Kelurahandesa;
use Illuminate\Support\Carbon;
use App\Exports\StuntingExport;
use App\Imports\StuntingImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateStuntingRequest;

class StuntingController extends Controller
{
    public function index(Request $request)
    {
        // Search stunting by nama_balita, pagination 10
        $stuntings = Stunting::with('kecamatan', 'kelurahandesa')
            ->where('NAMA_BALITA', 'like', '%' . request('nama_balita') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Contoh nilai median dan standar deviasi dari standar referensi
        // $median_height = 40; // Nilai median tinggi badan dari standar referensi
        // $std_dev_height = 40; // Standar deviasi tinggi badan dari standar referensi
        // $median_weight = 40; // Nilai median berat badan dari standar referensi
        // $std_dev_weight = 40; // Standar deviasi berat badan dari standar referensi

        // foreach ($stuntings as $stunting) {
        //     // Hitung umur dalam bulan sesuai dengan updated_at
        //     // $stunting->UMUR = Carbon::parse($stunting->updated_at)->diffInMonths();
        //     // $stunting->UMUR = Carbon::now()->diffInMonths($stunting->TGL_LAHIR);
        //     $stunting->UMUR;

        //     // Hitung Z-score untuk TB/U
        //     $z_score_height = ($stunting->TINGGI_BADAN - $median_height) / $std_dev_height;
        //     if ($z_score_height < -3) {
        //         $stunting->STATUS_TBU = 'Sangat Pendek';
        //     } elseif ($z_score_height >= -3 && $z_score_height < -2) {
        //         $stunting->STATUS_TBU = 'Pendek';
        //     } else {
        //         $stunting->STATUS_TBU = 'Normal';
        //     }

        //     // Hitung Z-score untuk BB/U
        //     $z_score_weight = ($stunting->BERAT_BADAN - $median_weight) / $std_dev_weight;
        //     if ($z_score_weight < -3) {
        //         $stunting->STATUS_BBU = 'Sangat Kurang';
        //     } elseif ($z_score_weight >= -3 && $z_score_weight < -2) {
        //         $stunting->STATUS_BBU = 'Kurang';
        //     } elseif ($z_score_weight >= -2 && $z_score_weight <= 2) {
        //         $stunting->STATUS_BBU = 'Normal';
        //     } else {
        //         $stunting->STATUS_BBU = 'Lebih';
        //     }

        //     // Hitung Z-score untuk BB/TB
        //     $z_score_bbtb = ($stunting->BERAT_BADAN - ($median_weight + ($std_dev_weight * ($stunting->TINGGI_BADAN / 100)))) / $std_dev_weight;
        //     if ($z_score_bbtb < -2) {
        //         $stunting->STATUS_BBTB = 'Gizi Kurang';
        //     } else {
        //         $stunting->STATUS_BBTB = 'Gizi Baik';
        //     }
        // }
        return view('pages.stuntings.index', compact('stuntings'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::all();
        $kelurahandesas = Kelurahandesa::all();
        return view('pages.stuntings.create', compact('kecamatans', 'kelurahandesas'));
    }

    public function store(StoreUserRequest $request)
    {
        $dataStunting = $request->validate();
        \App\Models\Stunting::create($dataStunting);

        return redirect()->route('stuntings.index')
            ->with('success', 'Data stunting berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kecamatans = Kecamatan::all();
        $kelurahandesas = Kelurahandesa::all();
        $stunting = Stunting::with('kecamatan', 'kelurahandesa')->findorfail($id);

        // $stunting= \App\Models\Stunting::findorfail($id);
        return view('pages.stuntings.edit', compact('stunting', 'kecamatans', 'kelurahandesas'));
    }

    public function update(UpdateStuntingRequest $request, Stunting $stunting)
    {
        $kecamatans = Kecamatan::all();
        $kelurahandesas = Kelurahandesa::all();
        $dataStunting = $request->validate();
        $stunting->update($dataStunting);
        return redirect()->route('stuntings.index')
            ->with('success', 'Stunting updated successfully');
    }

    public function show(Stunting $stunting)
    {
        return view('pages.stuntings.show', compact('stunting'));
    }

    public function destroy($id)
    {
        $stunting = Stunting::findorfail($id);
        $stunting->delete();
        return redirect()->route('stuntings.index')
            ->with('success', 'Stunting deleted successfully');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        Excel::import(new StuntingImport, $request->file('file'));

        return redirect()->route('stuntings.index')
            ->with('success', 'Data berhasil di import.');
    }

    public function export()
    {
        return (new StuntingExport)->download('stuntings-'.Carbon::now()->timestamp.'.xlsx');
    }

    public function dataEppgbm(Request $request)
    {
        $lapTahun = TahunLap::all();
        $lapBulan = BulanLap::when($request->tahun_id, function ($query) use ($request) {
            return $query->where('TAHUN_ID', $request->tahun_id);
        })->get();
        $dataeppgbm = ePPGBM::when($request->tahun_id, function ($query) use ($request) {
            return $query->where('TAHUN_ID', $request->tahun_id);
        })->when($request->bulan_id, function ($query) use ($request) {
            return $query->where('BULAN_ID', $request->bulan_id);
        })->get();
        if ($request->tahun_id && $request->bulan_id) {
            $dataeppgbm = ePPGBM::where('TAHUN_ID', $request->tahun_id)->where('BULAN_ID', $request->bulan_id)->get();
        }

        return view('pages.stuntings.eppgbm')
            ->with('dataeppgbm', $dataeppgbm)
            ->with('lapTahun', $lapTahun)
            ->with('lapBulan', $lapBulan);
    }


}
