<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stunting;
use App\Imports\StuntingImport;
use Maatwebsite\Excel\Facades\Excel;

class StuntingController extends Controller
{
    public function index(Request $request)
    {
        // Search stunting by nama_balita, pagination 10
        $stuntings = Stunting::where('NAMA_BALITA', 'like', '%' . request('nama_balita') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Contoh nilai median dan standar deviasi dari standar referensi
        $median = 50; // Nilai median dari standar referensi
        $std_dev = 10; // Standar deviasi dari standar referensi

        foreach ($stuntings as $stunting) {
            $z_score = ($stunting->TINGGI_BADAN - $median) / $std_dev;

            if ($z_score < -3) {
                $stunting->STATUS_TBU = 'Sangat Pendek';
            } elseif ($z_score >= -3 && $z_score < -2) {
                $stunting->STATUS_TBU = 'Pendek';
            } else {
                $stunting->STATUS_TBU = 'Normal';
            }
        }

        return view('pages.stuntings.index', compact('stuntings'));
    }

    public function create()
    {
        return view('pages.stuntings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NAMA_BALITA' => 'required',
            'sumber_data' => 'required', // Validasi untuk sumber_data
            'tgl_pengukuran' => 'required|date', // Validasi untuk tgl_pengukuran
        ]);

        Stunting::create($request->all());

        return redirect()->route('stuntings.index')
            ->with('success', 'Stunting created successfully.');
    }

    public function show(Stunting $stunting)
    {
        return view('pages.stuntings.show', compact('stunting'));
    }

    public function edit(Stunting $stunting)
    {
        return view('pages.stuntings.edit', compact('stunting'));
    }

    public function update(Request $request, Stunting $stunting)
    {
        $request->validate([
            'NAMA_BALITA' => 'required',
            'sumber_data' => 'required', // Validasi untuk sumber_data
            'tgl_pengukuran' => 'required|date', // Validasi untuk tgl_pengukuran
        ]);

        $stunting->update($request->all());

        return redirect()->route('stuntings.index')
            ->with('success', 'Stunting updated successfully');
    }

    public function destroy(Stunting $stunting)
    {
        $stunting->delete();
        return redirect()->route('stuntings.index')
            ->with('success', 'Stunting deleted successfully');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        Excel::import(new StuntingImport, $request->file('file'));

        return redirect()->route('stuntings.index')
            ->with('success', 'Data berhasil di import.');
    }
}
