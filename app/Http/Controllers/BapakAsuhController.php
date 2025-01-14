<?php

namespace App\Http\Controllers;

use App\Models\BapakAsuh;
use Illuminate\Http\Request;

class BapakAsuhController extends Controller
{
    public function index(Request $request)
    {
        $bapakasuhs = BapakAsuh::get();
        $bapakasuhs = BapakAsuh::where('NAMA_ORANGTUAASUH', 'like', '%' . request('nama_orangtuaasuh') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.bapakasuhs.index', compact('bapakasuhs'));
    }

    public function show($id)
    {
        $bapakasuh = BapakAsuh::find($id);
        return view('pages.bapakasuhs.edit', compact('bapakasuh'));
    }

    public function create()
    {
        return view('pages.bapakasuhs.create');
    }

    public function store(Request $request)
    {
        $bapakasuh = new BapakAsuh();
        $bapakasuh->NIK_ORANGTUAASUH = $request->NIK_ORANGTUAASUH;
        $bapakasuh->NAMA_ORANGTUAASUH = $request->NAMA_ORANGTUAASUH;
        $bapakasuh->NIP = $request->NIP;
        $bapakasuh->ALAMAT = $request->ALAMAT;
        $bapakasuh->NOHP = $request->NOHP;
        $bapakasuh->save();

        return redirect()->route('bapakasuhs.index')->with('success', 'Data Bapak Ibu Asuh berhasil disimpan.');
    }

    public function edit($id)
    {
        $bapakasuh = BapakAsuh::find($id);
        return view('pages.bapakasuhs.edit', compact('bapakasuh'));
    }

    public function update(Request $request, $id)
    {
        $bapakasuh = BapakAsuh::find($id);
        $bapakasuh->NIK_ORANGTUAASUH = $request->NIK_ORANGTUAASUH;
        $bapakasuh->NAMA_ORANGTUAASUH = $request->NAMA_ORANGTUAASUH;
        $bapakasuh->NIP = $request->NIP;
        $bapakasuh->ALAMAT = $request->ALAMAT;
        $bapakasuh->NOHP = $request->NOHP;
        $bapakasuh->update();

        return redirect()->route('bapakasuhs.index')->with('success', 'Data Bapak Ibu Asuh berhasil diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        $bapakasuh = BapakAsuh::find($id);
        $bapakasuh->delete();
        return redirect()->route('bapakasuhs.index')->with('success', 'Data berhasil dihapus');
    }
}
