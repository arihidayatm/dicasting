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
use App\Models\StuntingPengukuran;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class StuntingController extends Controller
{
    public function index(Request $request)
    {
        $stuntingPengukuran = StuntingPengukuran::with('stuntings')->paginate(10);
        // search berdasarkan bulan pada Stunting Pengukuran
        $bulan = $request->bulan;
        if ($bulan) {
            $stuntingPengukuran = StuntingPengukuran::whereMonth('TGL_UKUR', $bulan)->paginate(10);
        }

        // Search stunting by nama_balita, pagination 10
        $stuntings = Stunting::with('kecamatan', 'kelurahandesa')
            ->where('NAMA_BALITA', 'like', '%' . request('nama_balita') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);


        return view('pages.stuntings.index', compact('stuntings','stuntingPengukuran'));
    }

    public function create()
    {
        $kecamatans = Kecamatan::all();
        $kelurahandesas = Kelurahandesa::all();
        return view('pages.stuntings.create', compact('kecamatans', 'kelurahandesas'));
    }

    public function store(Request $request)
    {
        $dataStunting = $request->validate([
            'NIK' => 'required|numeric|unique:stuntings,NIK',
            'NAMA_BALITA' => 'required|string|max:255',
            'KECAMATAN_ID' => 'required|numeric',
            'KELURAHANDESA_ID' => 'required|numeric',
            'TGL_LAHIR' => 'required|date',
            'JENIS_KELAMIN' => 'required|string|in:L,P',
            'NAMA_IBU' => 'required|string|max:255',
            'NAMA_AYAH' => 'nullable|string|max:255',
            'ALAMAT' => 'required|string|max:255',
            'NO_HP' => 'required|numeric',
            'TGL_UKUR' => 'required|date',
            'BB_UKUR' => 'required|numeric',
        ]);

        $stunting = Stunting::create($dataStunting);

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

    public function detailData($id)
    {
        $stunting = Stunting::with('kecamatan', 'kelurahandesa')->findorfail($id);
        $riwayatPertumbuhanAnak = StuntingPengukuran::whereHas('stuntings', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        return view('pages.stuntings.detail', compact('stunting','riwayatPertumbuhanAnak'));
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

    public function dataPengukuran(Request $request)
    {
        $stuntingPengukuran = StuntingPengukuran::with('stuntings')->paginate(10);

        // search berdasarkan nama balita pada Stunting Pengukuran
        $name = $request->name;
        if ($name) {
            $stuntingPengukuran = StuntingPengukuran::whereHas('stuntings', function($query) use ($name) {
                $query->where('NAMA_BALITA', 'like', "%{$name}%");
            })->paginate(10);
        }

        // search berdasarkan bulan pada Stunting Pengukuran
        $bulan = $request->bulan;
        if ($bulan) {
            $stuntingPengukuran = StuntingPengukuran::whereMonth('TGL_UKUR', $bulan)->paginate(10);
        }
        // list bulan
        $bulanList = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];
        return view('pages.stuntings.pengukuran', compact('stuntingPengukuran','bulan','bulanList'));
    }


    public function updatedataPengukuran(Request $request, $NIK)
    {
        $stuntingPengukuran = StuntingPengukuran::where('NIK', $NIK)->firstorfail();
        $dataStuntingPengukuran = $request->validate([
            'BB_UKUR' => 'required',
            'TB_UKUR' => 'required',
            'CARA_UKUR' => 'required',
            'TGL_UKUR' => 'required',
        ]);
        $stuntingPengukuran->update($dataStuntingPengukuran);
        return redirect()->route('stuntings.pengukuran', $NIK)
            ->with('success', 'Data Pengukuran Berhasil di Perbarui');
    }
    
    // public function import(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:csv,xls,xlsx',
    //     ]);

    //     Excel::import(new StuntingImport, $request->file('file'));

    //     return redirect()->route('stuntings.index')
    //         ->with('success', 'Data berhasil di import.');
    // }

    public function importDataStunting(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        $import = new StuntingImport;
        $import->startRow(2);
        Excel::import($import, $request->file('file'));

        return redirect()->route('stuntings.index')->with('succes','Data Stunting Berhasil di Import');
    }

    public function export()
    {
        return (new StuntingExport)->download('stuntings-'.Carbon::now()->timestamp.'.xlsx');
    }

    public function indexEppgbm(Request $request)
    {
        $dataeppgbm = Stunting::all();

        return view('pages.eppgbm.index', compact('dataeppgbm'));
    }

    public function showStuntingCount()
    {
        $chartLineStunting = Chartjs::build()
            ->name("LineStuntingChart")
            ->type("line")
            ->size(["width" => 500, "height" => 195])
            ->labels(["Januari", "Februari", "Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"])
            ->datasets([
                [
                    "label" => "Jumlah Kasus",
                    // "backgroundColor" => '#36A2EB',
                    "borderColor" => '#9BD0F5',
                    "borderWidth" => 2,
                    // "data" => [20,22,23,23,24,24,23,22,]
                    "data" => [184,189,190,188,190,206,203,197,192,190,194,221]
                ],
                [
                    "label" => "Kasus Aktif",
                    // "backgroundColor" => '#FF6384',
                    "borderColor" => '#FF6384',
                    "borderWidth" => 2,
                    // "data" => [20,22,24,22,23,20,20,19,20]
                    "data" => [184,189,190,188,190,206,203,197,192,190,194,221]
                ],
                [
                    "label" => "Penyelesaian",
                    // "backgroundColor" => '#4BC0C0',
                    "borderColor" => '#4BC0C0',
                    "borderWidth" => 2,
                    // "data" => [21,23,24,23,21,22,20,21,21]
                    "data" => [184,189,190,188,190,206,203,197,192,190,194,0]
                ]
            ])
            ->options([
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Total Stunting Tahun 2024'
                    ]
                ]
            ]);

        return $chartLineStunting;
    }

    public function showChartSexRatio()
    {
        $maleCount = Stunting::where("JENIS_KELAMIN", "L")->count();
        $femaleCount = Stunting::where("JENIS_KELAMIN", "P")->count();

        $chartSexRatio = Chartjs::build()
            ->name("SexRatioChart")
            ->type("bar")
            ->size(["width" => 1000, "height" => 1000])
            ->labels(["Data Stunting"])
            ->datasets([
                [
                    "label" => "Laki-laki",
                    "backgroundColor" => '#36A2EB',
                    "borderColor" => '#9BD0F5',
                    "borderWidth" => 2,
                    // "data" => [$maleCount]
                    "data" => [138]
                ],
                [
                    "label" => "Perempuan",
                    "backgroundColor" => '#FF6384',
                    "borderColor" => '#FFB1C1',
                    "borderWidth" => 2,
                    // "data" => [$femaleCount]
                    "data" => [83]
                ]
            ])
            ->options([
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Stunting Berdasarkan Jenis Kelamin'
                    ]
                ]
            ]);

        // return view('pages.charts.stunting', compact('chartSexRatio'));
        return $chartSexRatio;
    }

    public function showChartPieSexRatio()
    {
        $maleCount = Stunting::where("JENIS_KELAMIN", "L")->count();
        $femaleCount = Stunting::where("JENIS_KELAMIN", "P")->count();

        $chartPieSexRatio = Chartjs::build()
            ->name("PieSexRatioChart")
            ->type("pie")
            ->size(["width" => 250, "height" => 200])
            ->labels(["Laki-laki","Perempuan"])
            ->datasets([
                [
                    "label" => "Stunting",
                    // "backgroundColor" => ["rgba(54, 162, 235, 0.2)", "rgba(255, 99, 132, 0.2)"],
                    "backgroundColor" => ['rgb(255, 99, 132)', 'rgb(54, 162, 235)'],
                    // "borderColor" => ["rgba(54, 162, 235, 1)", "rgba(255, 99, 132, 1)"],
                    "borderColor" => ['rgba(255,255,255)'],
                    "borderWidth" => 2,
                    // "data" => [$maleCount, $femaleCount]
                    "data" => [138,83]
                ],
            ])
            ->options([
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Stunting Berdasarkan Jenis Kelamin'
                    ]
                ]
            ]);

        // return view('pages.charts.stunting', compact('chartSexRatio'));
        return $chartPieSexRatio;
    }

    public function showChartStuntingKecamatan()
    {
        $chartStuntingKecamatan = Chartjs::build()
            ->name("stuntingKecamatanChart")
            ->type("bar")
            ->size(["width" => 500, "height" => 200])
            ->labels(["SILUNGKANG","LEMBAH SEGAR","BARANGIN","TALAWI"])
            ->datasets([
                [
                    "label" => "Laki-laki",
                    "backgroundColor" => '#36A2EB',
                    "borderColor" => '#9BD0F5',
                    "borderWidth" => 2,
                    "data" => [21, 35, 34, 38]
                ],
                [
                    "label" => "Perempuan",
                    "backgroundColor" => '#FF6384',
                    "borderColor" => '#FFB1C1',
                    "borderWidth" => 2,
                    "data" => [11, 29, 18, 19]
                ]
            ])
            ->options([
                'plugins' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Total Stunting Berdasarkan Kecamatan'
                    ]
                ]
            ]);

        // return view('pages.charts.stunting', compact('chartStuntingKecamatan'));
        return $chartStuntingKecamatan;
    }

    public function showChartStunting()
    {
        $chartLineStunting = $this->showStuntingCount();
        $chartSexRatio = $this->showChartSexRatio();
        $chartPieSexRatio = $this->showChartPieSexRatio();
        $chartStuntingKecamatan = $this->showChartStuntingKecamatan();
        return view('pages.charts.stunting', compact('chartLineStunting','chartStuntingKecamatan', 'chartSexRatio','chartPieSexRatio'));
    }

    public function dashboardChartStunting()
    {
        $chartLineStunting = $this->dashboardChartStunting();
        // $chartSexRatio = $this->showChartSexRatio();
        // $chartPieSexRatio = $this->showChartPieSexRatio();
        // $chartStuntingKecamatan = $this->showChartStuntingKecamatan();
        return view('pages.dashboard', compact('chartLineStunting'));

    }
}
