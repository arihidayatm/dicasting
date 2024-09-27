<?php

namespace App\Http\Controllers;

use App\Models\Balita;
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
    /**
     * Display a listing of the resource.
     */
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

    public function showChart()
    {
        $chart = Chartjs::database(Balita::all(), 'bar', 'highcharts')
            ->title('Jumlah Balita')
            ->elementLabel('Jumlah Balita')
            ->dimensions(1000, 500)
            ->responsive(true)
            ->groupByMonth(date('Y'), true);

        return view('pages.charts.balita', compact('chart'));
    }
}
