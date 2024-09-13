<?php

namespace App\Http\Controllers;

use App\Models\BapakAsuh;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\Kabupatenkota;
use App\Models\Kelurahandesa;

class BapakAsuhController extends Controller
{
    public function index(Request $request)
    {
        $bapakasuhs = BapakAsuh::with(['kabupatenkota','kecamatan','kelurahandesa'])
            ->where('NAMA_ORANGTUAASUH', 'like', '%' . request('nama_orangtuaasuh') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.bapakasuhs.index', compact('bapakasuhs'));
    }

    public function create()
    {
        $kabupatens = Kabupatenkota::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = KelurahanDesa::all();
        return view('pages.bapakasuhs.create', compact('kabupatens', 'kecamatans', 'kelurahans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIK_ORANGTUAASUH' => 'string|max:255',
            'NAMA_ORANGTUAASUH' => 'required|string|max:255',
            'ALAMAT' => 'string|max:255',
            'KABUPATEN_ID' => 'required|exists:kabupatenkotas,id',
            'KECAMATAN_ID' => 'required|exists:kecamatans,id',
            'KELURAHANDESA_ID' => 'required|exists:kelurahandesas,id',
            'NOHP' => 'string|max:15',
        ]);

        try {
            BapakAsuh::create($request->validated());
            return redirect()->route('bapakasuhs.index')->with('success', 'Data Bapak Asuh berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data Bapak Asuh');
        }
    }

    public function edit($id)
    {
        $bapakasuh = BapakAsuh::with(['kabupatenkota', 'kecamatan', 'kelurahandesa'])->findOrFail($id);
        $kabupatens = Kabupatenkota::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahandesa::all();
        // dd($bapakasuh);
        return view('pages.bapakasuhs.edit', compact('bapakasuh', 'kabupatens', 'kecamatans', 'kelurahans'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'NIK_ORANGTUAASUH' => 'required|string|max:255',
            'NAMA_ORANGTUAASUH' => 'required|string|max:255',
            'ALAMAT' => 'required|string|max:255',
            'KABUPATEN_ID' => 'required|exists:kabupatenkotas,id',
            'KECAMATAN_ID' => 'required|exists:kecamatans,id',
            'KELURAHANDESA_ID' => 'required|exists:kelurahandesas,id',
            'NOHP' => 'required|string|max:15',
        ]);

        $bapakasuh = BapakAsuh::findOrFail($id);
        $bapakasuh->update($request->except('_token'));

        return redirect()->route('bapakasuhs.index')->with('success', 'Data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $bapakasuh = BapakAsuh::findOrFail($id);
        $bapakasuh->delete();
        return redirect()->route('bapakasuhs.index')->with('success', 'Data berhasil dihapus');
    }

    // public function getKecamatan($kabupatenkota_id)
    // {
    //     $kecamatans = Kecamatan::where('kabupatenkota_id', $kabupatenkota_id)->get();
    //     return response()->json($kecamatans);
    // }

    // public function getKelurahan($kecamatan_id)
    // {
    //     $kelurahans = Kelurahandesa::where('kecamatan_id', $kecamatan_id)->get();
    //     return response()->json($kelurahans);
    // }
    // Controller
    public function dashboard()
    {
        $bapakasuhs = BapakAsuh::all(); // contoh query untuk mendapatkan data bapak asuh
        return view('dashboard', compact('bapakasuhs'));
    }
}
