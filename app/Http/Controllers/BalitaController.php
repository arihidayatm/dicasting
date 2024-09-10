<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use Illuminate\Http\Request;
use App\Exports\BalitaExport;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $balitas = Balita::with('kabupatenkota','kecamatan', 'kelurahandesa', 'puskesmas')
            ->where('NAMA_BALITA', 'like', '%' . request('nama_balita') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.masters.dataBalita', compact('balitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Balita $balita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Balita $balita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Balita $balita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Balita $balita)
    {
        //
    }

    public function export()
    {
        return Excel::download(new BalitaExport,'balita-'.Carbon::now()->timestamp.'.xlsx');
    }

    public function import(Request $request)
    {
        dd($request->file('file'));
        // $file = $request->file('file');
        // Excel::import(new BalitaImport, $file);
        // return redirect()->back();
    }

}
