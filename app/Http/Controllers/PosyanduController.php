<?php

namespace App\Http\Controllers;

use App\Models\Posyandu;
use Illuminate\Http\Request;

class PosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posyandus = Posyandu::with('kabupatenkota','kecamatan','kelurahandesa','puskesmas')
            ->where('NAMA_POSYANDU', 'like', '%' . request('nama_posyandu') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.masters.dataPosyandu', compact('posyandus'));
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
    public function show(Posyandu $posyandu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posyandu $posyandu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posyandu $posyandu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posyandu $posyandu)
    {
        //
    }
}
