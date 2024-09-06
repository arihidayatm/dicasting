<?php

namespace App\Http\Controllers;

use App\Models\Puskesmas;
use Illuminate\Http\Request;

class PuskesmasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $puskesmas = Puskesmas::with('kabupatenkota','kecamatan')
            ->where('NAMA_PUSKESMAS', 'like', '%' . request('nama_puskesmas') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.masters.dataPuskesmas', compact('puskesmas'));
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
    public function show(Puskesmas $puskesmas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puskesmas $puskesmas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puskesmas $puskesmas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puskesmas $puskesmas)
    {
        //
    }
}
