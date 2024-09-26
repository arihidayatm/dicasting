<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BentukIntervensi;
use App\Models\JenisIntervensi;

class IntervensiController extends Controller
{
    public function index(Request $request)
    {
        $jenisIntervensis = JenisIntervensi::all();
        $bentukIntervensis = BentukIntervensi::when($request->jenis_intervensi, function ($query) use ($request) {
            return $query->where('INTERVENSI_ID', $request->jenis_intervensi);
        })->paginate(7); // Pastikan menggunakan paginate(7) di sini

        return view('pages.intervensis.index', compact('jenisIntervensis', 'bentukIntervensis'));
    }

    public function createJenisIntervensi()
    {
        return view('pages.intervensis.create_jenis_intervensi');
    }

    public function storeJenisIntervensi(Request $request)
    {
        $request->validate([
            'jenis_intervensi' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        JenisIntervensi::create([
            'JENIS_INTERVENSI' => $request->jenis_intervensi,
            'KETERANGAN' => $request->keterangan,
        ]);

        return redirect()->route('intervensi.index')->with('success', 'Jenis Intervensi created successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bentuk_intervensi' => 'required|string|max:255',
        ]);

        BentukIntervensi::create([
            'INTERVENSI_ID' => $request->jenis_intervensi,
            'BENTUK_INTERVENSI' => $request->bentuk_intervensi,
            'KETERANGAN' => $request->keterangan,
        ]);

        return redirect()->route('intervensi.index')
            ->with('success', 'Bentuk Intervensi created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bentuk_intervensi' => 'required|string|max:255',
        ]);

        $bentukIntervensi = BentukIntervensi::findOrFail($id);
        $bentukIntervensi->update([
            'BENTUK_INTERVENSI' => $request->bentuk_intervensi,
            'KETERANGAN' => $request->keterangan,
        ]);

        return redirect()->route('intervensi.index')->with('success', 'Bentuk Intervensi updated successfully.');
    }

    public function show($id)
    {
        $intervensi = BentukIntervensi::findOrFail($id);
        return view('pages.intervensis.show', compact('intervensi'));
    }

    public function edit($id)
    {
        $intervensi = BentukIntervensi::findOrFail($id);
        return view('pages.intervensis.edit', compact('intervensi'));
    }

    public function destroy($id)
    {
        $intervensi = BentukIntervensi::findOrFail($id);
        $intervensi->delete();

        return redirect()->route('intervensi.index')->with('success', 'Intervensi deleted successfully.');
    }
}
