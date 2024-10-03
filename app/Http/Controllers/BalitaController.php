<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Exports\BalitaExport;
use App\Imports\BadutaImport;
// use Illuminate\Support\Facades\DB;
use App\Imports\BalitaImport;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class BalitaController extends Controller
{
    public function index(Request $request)
    {
        // $kecamatans = Balita::select('KECAMATAN_ID')->distinct()->get();
        // $kelurahandesas = Balita::select('KELURAHANDESA_ID')->distinct()->get();
        // $balitas = Balita::with('kabupatenkota','kecamatan', 'kelurahandesa', 'puskesmas')
        $balitas = Balita::where('NAMA_BALITA', 'like', '%' . request('nama_balita') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.masters.dataBalita', compact('balitas'));
    }

    public function create()
    {
        return view('pages.masters.createBalita');
    }

    public function store(Request $request)
    {
        $balita = new Balita;
        $balita->NIK = $request->nik;
        $balita->NO_KK = $request->no_kk;
        $balita->ANAK_KE = $request->anak_ke;
        $balita->NAMA_BALITA = $request->nama_balita;
        $balita->TGL_LAHIR = $request->tgl_lahir;
        $balita->JENIS_KELAMIN = $request->jk;
        $balita->NAMA_AYAH = $request->nama_ayah;
        $balita->NAMA_IBU = $request->nama_ibu;
        // $balita->NAMA_ORANGTUA = $request->nama_orangtua;
        $balita->ALAMAT = $request->alamat;
        $balita->RT = $request->rt;
        $balita->RW = $request->rw;
        $balita->KABUPATENKOTA_ID = $request->kabupaten_kota;
        $balita->KECAMATAN_ID = $request->kecamatan;
        $balita->PUSKESMAS_ID = $request->puskesmas;
        $balita->KELURAHANDESA_ID = $request->kelurahan_desa;
        $balita->save();

        return redirect()->route('balita.index');
    }

    public function show(Balita $balita)
    {
        return view('pages.masters.show', compact('balita'));
    }

    public function edit(Balita $balita)
    {
        return view('pages.masters.editBalita', compact('balita'));
    }

    public function update(Request $request, Balita $balita)
    {
        // Lakukan validasi data
        $validatedData = $request->validate([
            'NIK' => 'required',
            'NO_KK' => 'required',
            'ANAK_KE' => 'required',
            'NAMA_BALITA' => 'required',
            'TGL_LAHIR' => 'required',
            'JENIS_KELAMIN' => 'required',
            'NAMA_ORANGTUA' => 'required',
            'ALAMAT' => 'required',
            'RT' => 'required',
            'RW' => 'required',
            // 'KABUPATENKOTA_ID' => 'required',
            'KECAMATAN' => 'required',
            'PUSKESMAS' => 'required',
            'KELURAHANDESA' => 'required',
            'PUSKESMAS' => 'required',
        ]);

        // Perbarui data balita
        $balita->update($validatedData);

        // Kembalikan response sukses
        return redirect()->route('balita.index')->with('success', 'Data balita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $balita = Balita::find($id);
        $balita->delete();
        return redirect()->route('balita.index')->with('success', 'Data Balita berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new BalitaExport,'balita-'.Carbon::now()->timestamp.'.xlsx');
    }

    public function import(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $import = new BadutaImport;
        $import->startRow(2);
        Excel::import($import, $request->file('file'));

        return redirect()->route('balita.index')->with('succes','Data Baduta Berhasil di Import');
    //     Excel::import(new BalitaImport, $request->file('file'));
    //     return redirect()->route('balita.index')
    //         ->with('success', 'Data Balita berhasil di import...!');
    }

    // public function import(Request $request)
    // {
    //     $request= Balita::validate([
    //         'file' => 'required|mimes:xls,xlsx'
    //     ]);

    //     $import = new BadutaImport;
    //     $import->startRow(1);
    //     Excel::import($import, $request->file('file'));

    //     return redirect()->route('balita.index')->with('succes','Data Baduta Berhasil di Import');
    // }

    //type Bar
    public function showChartAgeStatus()
    {
        // Ambil tanggal lahir dari tabel Balita
        $tglLahir = Balita::pluck('TGL_LAHIR');

        // Hitung umur sampai hari ini berdasarkan TGL_LAHIR
        $umur = [];
        foreach ($tglLahir as $lahir) {
            $umur[] = Carbon::parse($lahir)->diffInMonths(Carbon::now());
        }

        // Hitung jumlah Baduta (0-24 bulan) dan Balita (25-60 bulan)
        $baduta = 0;
        $balita = 0;
        foreach ($umur as $age) {
            if ($age <= 24) {
                $baduta++;
            } elseif ($age >= 25 && $age <= 60) {
                $balita++;
            }
        }

        $chartAgeStatus = Chartjs::build()
            ->name("AgeStatusChart")
            ->type("bar")
            ->size(["width" => 200, "height" => 200])
            ->labels(["Anak"])
            ->datasets([
                [
                    "label" => "Baduta (0-24 bulan)",
                    "backgroundColor" => ["rgba(255, 99, 132, 0.2)"],
                    "data" => [$baduta]
                ],
                [
                    "label" => "Balita (25-60 bulan)",
                    "backgroundColor" => ["rgba(54, 162, 235, 0.2)"],
                    "data" => [$balita]
                ]
            ])
            ->options([
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Status Anak Berdasarkan Kategori Umur'
                    ]
                ]
        ]);

        return $chartAgeStatus;
    }

    public function showChartSexRatio()
    {
        $maleCount = Balita::where("JENIS_KELAMIN", "L")->count();
        $femaleCount = Balita::where("JENIS_KELAMIN", "P")->count();

        $chartSexRatio = Chartjs::build()
            ->name("SexRatioChart")
            ->type("pie")
            ->size(["width" => 200, "height" => 200])
            ->labels(["Laki-laki", "Perempuan"])
            ->datasets([
                [
                    "label" => "Anak",
                    // "backgroundColor" => ["rgba(54, 162, 235, 0.2)", "rgba(255, 99, 132, 0.2)"],
                    "backgroundColor" => ['rgb(255, 99, 132)', 'rgb(54, 162, 235)'],
                    // "borderColor" => ["rgba(54, 162, 235, 1)", "rgba(255, 99, 132, 1)"],
                    "borderColor" => ['rgba(255,255,255)'],
                    "borderWidth" => 2,
                    "data" => [$maleCount, $femaleCount]
                ]
            ])
            ->options([
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Anak Berdasarkan Jenis Kelamin'
                    ]
                ]
            ]);

        // return view('pages.charts.balita', compact('chartSexRatio'));
        return $chartSexRatio;
    }

    public function showChartBalita()
    {
        $chartAgeStatus = $this->showchartAgeStatus();
        $chartSexRatio = $this->showChartSexRatio();
        return view('pages.charts.balita', compact('chartAgeStatus','chartSexRatio'));
    }


}
