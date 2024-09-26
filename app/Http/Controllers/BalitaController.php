<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use Illuminate\Http\Request;
use App\Exports\BalitaExport;
// use Illuminate\Support\Facades\DB;
use App\Imports\BalitaImport;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kecamatans = Balita::select('KECAMATAN_ID')->distinct()->get();
        $kelurahandesas = Balita::select('KELURAHANDESA_ID')->distinct()->get();
        $balitas = Balita::with('kabupatenkota','kecamatan', 'kelurahandesa', 'puskesmas')
            ->where('NAMA_BALITA', 'like', '%' . request('nama_balita') . '%')
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
            'KABUPATENKOTA_ID' => 'required',
            'KECAMATAN_ID' => 'required',
            'PUSKESMAS_ID' => 'required',
            'KELURAHANDESA_ID' => 'required',
        ]);

        // Perbarui data balita
        $balita->update($validatedData);

        // Kembalikan response sukses
        return redirect()->route('balita.index')->with('success', 'Data balita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $balita = Balita::findOrFail($id);
        $balita->delete();
        return redirect()->route('balita.index')->with('success', 'Data berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new BalitaExport,'balita-'.Carbon::now()->timestamp.'.xlsx');
    }

    public function import(Request $request)
    {
        // dd($request->file('file'));
        // $file = $request->file('file');
        Excel::import(new BalitaImport, $request->file('file'));
        // return redirect()->back();
        return redirect()->route('balita.index')
            ->with('success', 'Data Balita berhasil di import...!');
    }

}
