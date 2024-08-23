<?php

namespace App\Http\Controllers;

use App\Models\Stunting;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\Kelurahandesa;
use Illuminate\Support\Carbon;
use App\Exports\StuntingExport;
use App\Imports\StuntingImport;
use Maatwebsite\Excel\Facades\Excel;

class StuntingController extends Controller
{
    public function index(Request $request)
    {
        // Search stunting by nama_balita, pagination 10
        $stuntings = Stunting::with(['kecamatan', 'kelurahandesa'])
            ->where('NAMA_BALITA', 'like', '%' . request('nama_balita') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Contoh nilai median dan standar deviasi dari standar referensi
        $median_height = 50; // Nilai median tinggi badan dari standar referensi
        $std_dev_height = 10; // Standar deviasi tinggi badan dari standar referensi
        $median_weight = 15; // Nilai median berat badan dari standar referensi
        $std_dev_weight = 5; // Standar deviasi berat badan dari standar referensi

        foreach ($stuntings as $stunting) {
            // Hitung umur dalam bulan
            $stunting->UMUR = Carbon::now()->diffInMonths($stunting->TGL_LAHIR);

            // Hitung Z-score untuk TB/U
            $z_score_height = ($stunting->TINGGI_BADAN - $median_height) / $std_dev_height;
            if ($z_score_height < -3) {
                $stunting->STATUS_TBU = 'Sangat Pendek';
            } elseif ($z_score_height >= -3 && $z_score_height < -2) {
                $stunting->STATUS_TBU = 'Pendek';
            } else {
                $stunting->STATUS_TBU = 'Normal';
            }

            // Hitung Z-score untuk BB/U
            $z_score_weight = ($stunting->BERAT_BADAN - $median_weight) / $std_dev_weight;
            if ($z_score_weight < -3) {
                $stunting->STATUS_BBU = 'Sangat Kurang';
            } elseif ($z_score_weight >= -3 && $z_score_weight < -2) {
                $stunting->STATUS_BBU = 'Kurang';
            } elseif ($z_score_weight >= -2 && $z_score_weight <= 2) {
                $stunting->STATUS_BBU = 'Normal';
            } else {
                $stunting->STATUS_BBU = 'Lebih';
            }

            // Hitung Z-score untuk BB/TB
            $z_score_bbtb = ($stunting->BERAT_BADAN - ($median_weight + ($std_dev_weight * ($stunting->TINGGI_BADAN / 100)))) / $std_dev_weight;
            if ($z_score_bbtb < -2) {
                $stunting->STATUS_BBTB = 'Gizi Kurang';
            } else {
                $stunting->STATUS_BBTB = 'Gizi Baik';
            }
        }
        return view('pages.stuntings.index', compact('stuntings'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::all();
        $kelurahandesas = Kelurahandesa::all();
        return view('pages.stuntings.create', compact('kecamatans', 'kelurahandesas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIK' => 'required',
            'NO_KK' => 'required',
            'NAMA_BALITA' => 'required',
            'TGL_LAHIR' => 'required',
            'JENIS_KELAMIN' => 'required',
            'BERAT_BADAN' => 'required',
            'TINGGI_BADAN' => 'required',
            'NAMA_ORANGTUA' => 'required',
            'ALAMAT' => 'required',
            'KECAMATAN_ID' => 'required',
            'KELURAHANDESA_ID' => 'required',
            'sumber_data' => 'required',
            'tgl_pengukuran' => 'required|date',
        ]);

        Stunting::create($request->all());

        return redirect()->route('stuntings.index')->with('success', 'Data stunting berhasil ditambahkan.');
    }

    public function show(Stunting $stunting)
    {
        return view('pages.stuntings.show', compact('stunting'));
    }

    public function edit(Stunting $stunting)
    {
        return view('pages.stuntings.edit', compact('stunting'));
    }

    public function update(Request $request, Stunting $stunting)
    {
        $request->validate([
            'NAMA_BALITA' => 'required',
            'sumber_data' => 'required', // Validasi untuk sumber_data
            'tgl_pengukuran' => 'required|date', // Validasi untuk tgl_pengukuran
        ]);

        $stunting->update($request->all());

        return redirect()->route('stuntings.index')
            ->with('success', 'Stunting updated successfully');
    }

    public function destroy(Stunting $stunting)
    {
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
}
