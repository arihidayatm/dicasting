<?php

namespace App\Http\Controllers;

use App\Models\IntervensiBPAS;
use Illuminate\Http\Request;

class IntervensiBPASController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $intervensiBPAS = IntervensiBPAS::with(['bapakasuh','bentukintervensi','stunting','kabupatenkota','kecamatan', 'kelurahandesa'])
            ->where('STUNTING_ID', 'like', '%' . request('stunting_id') . '%')
            ->orderBy('id', 'desc')
            ->paginate(7);
        return view('pages.intervensis.bpas.index', compact('intervensiBPAS'));
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
    public function show(IntervensiBPAS $intervensiBPAS)
    {
        return view('pages.intervensis.bpas.show', compact('intervensiBPAS'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IntervensiBPAS $intervensiBPAS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IntervensiBPAS $intervensiBPAS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IntervensiBPAS $intervensiBPAS)
    {
        $intervensiBPAS->delete();
        return redirect()->route('intervensi-bpas.index')->with('success', 'Intervensi Data berhasil dihapus');
    }
}
