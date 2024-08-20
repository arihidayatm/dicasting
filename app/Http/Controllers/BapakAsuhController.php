<?php

namespace App\Http\Controllers;

use App\Models\BapakAsuh;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\Kabupatenkota;
use App\Models\Kelurahandesa;

class BapakAsuhController extends Controller
{
    public function index()
    {
        $bapakasuhs = BapakAsuh::with(['kabupatenkota', 'kecamatan', 'kelurahandesa'])->paginate(10);
        return view('pages.bapakasuhs.index', compact('bapakasuhs'));
    }

    public function create()
    {
        $kabupatens = Kabupatenkota::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = KelurahanDesa::all();
        return view('pages.bapakasuhs.create', compact('kabupatens', 'kecamatans', 'kelurahans'));
    }

    public function edit($id)
    {
        $bapakasuh = BapakAsuh::with(['kabupatenkota', 'kecamatan', 'kelurahandesa'])->findOrFail($id);
        $kabupatens = Kabupatenkota::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahandesa::all();
        return view('pages.bapakasuhs.edit', compact('bapakasuh', 'kabupatens', 'kecamatans', 'kelurahans'));
    }


    public function update(Request $request, $id)
    {
        $bapakasuh = BapakAsuh::findOrFail($id);
        $bapakasuh->update($request->all());
        return redirect()->route('bapakasuhs.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $bapakasuh = BapakAsuh::findOrFail($id);
        $bapakasuh->delete();
        return redirect()->route('bapakasuhs.index')->with('success', 'Data berhasil dihapus');
    }
}
