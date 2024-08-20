<?php

namespace App\Http\Controllers;

use App\Models\AnakAsuh;
use App\Models\BapakAsuh;
use App\Models\Kecamatan;
use App\Models\KelurahanDesa;
use Illuminate\Http\Request;

class AnakAsuhController extends Controller
{
    public function index()
    {
        $anakAsuhs = AnakAsuh::with('bapakAsuh', 'kecamatan', 'kelurahan')->paginate(10);
        return view('pages.anakasuhs.index', compact('anakAsuhs'));
    }

    public function create()
    {
        $bapakAsuhs = BapakAsuh::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = KelurahanDesa::all();
        return view('pages.anakasuhs.create', compact('bapakAsuhs', 'kecamatans', 'kelurahans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bapak_asuh_id' => 'required',
            'nama_anak_asuh' => 'required',
            'alamat' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'keterangan' => 'nullable',
        ]);

        AnakAsuh::create($request->all());

        return redirect()->route('anakasuhs.index')->with('success', 'Data Anak Asuh berhasil ditambahkan.');
    }

    public function edit(AnakAsuh $anakasuh)
    {
        $bapakAsuhs = BapakAsuh::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = KelurahanDesa::all();
        return view('pages.anakasuhs.edit', compact('anakasuh', 'bapakAsuhs', 'kecamatans', 'kelurahans'));
    }

    public function update(Request $request, AnakAsuh $anakasuh)
    {
        $request->validate([
            'bapak_asuh_id' => 'required',
            'nama_anak_asuh' => 'required',
            'alamat' => 'required',
            'kecamatan_id' => 'required',
            'kelurahan_id' => 'required',
            'keterangan' => 'nullable',
        ]);

        $anakasuh->update($request->all());

        return redirect()->route('anakasuhs.index')->with('success', 'Data Anak Asuh berhasil diperbarui.');
    }

    public function destroy(AnakAsuh $anakasuh)
    {
        $anakasuh->delete();

        return redirect()->route('anakasuhs.index')->with('success', 'Data Anak Asuh berhasil dihapus.');
    }
}