<?php

namespace App\Http\Controllers;

use App\Models\NonBapakAsuh;
use Illuminate\Http\Request;

class NonBapakAsuhController extends Controller
{
    public function index(Request $request)
    {
        $nonbapakasuhs = NonBapakAsuh::get();
        $nonbapakasuhs = NonBapakAsuh::where('NAMA_NONORANGTUAASUH', 'like', '%' . request('nama_nonorangtuaasuh') . '%')
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.nonbapakasuhs.index', compact('nonbapakasuhs'));
    }

    public function show($id)
    {
        $nonbapakasuh = NonBapakAsuh::find($id);
        return view('pages.nonbapakasuhs.edit', compact('nonbapakasuh'));
    }

    public function create()
    {
        return view('pages.nonbapakasuhs.create');
    }

    public function store(Request $request)
    {
        $nonbapakasuh = new NonBapakAsuh();
        $nonbapakasuh->KODE_NONORANGTUAASUH = $request->KODE_NONORANGTUAASUH;
        $nonbapakasuh->NAMA_NONORANGTUAASUH = $request->NAMA_NONORANGTUAASUH;
        $nonbapakasuh->ALAMAT = $request->ALAMAT;
        $nonbapakasuh->NOHP = $request->NOHP;
        $nonbapakasuh->save();

        return redirect()->route('nonbapakasuhs.index')->with('success', 'Data Non Bapak Ibu Asuh berhasil disimpan.');
    }

    public function edit($id)
    {
        $nonbapakasuh = NonBapakAsuh::find($id);
        return view('pages.nonbapakasuhs.edit', compact('nonbapakasuh'));
    }

    public function update(Request $request, $id)
    {
        $nonbapakasuh = NonBapakAsuh::find($id);
        $nonbapakasuh->KODE_NONORANGTUAASUH = $request->KODE_NONORANGTUAASUH;
        $nonbapakasuh->NAMA_NONORANGTUAASUH = $request->NAMA_NONORANGTUAASUH;
        $nonbapakasuh->ALAMAT = $request->ALAMAT;
        $nonbapakasuh->NOHP = $request->NOHP;
        $nonbapakasuh->update();

        return redirect()->route('nonbapakasuhs.index')->with('success', 'Data Non Bapak Ibu Asuh berhasil diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        $nonbapakasuh = NonBapakAsuh::find($id);
        $nonbapakasuh->delete();
        return redirect()->route('nonbapakasuhs.index')->with('success', 'Data berhasil dihapus');
    }
}
