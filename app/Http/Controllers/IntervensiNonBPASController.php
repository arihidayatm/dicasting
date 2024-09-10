<?php

namespace App\Http\Controllers;

use App\Models\IntervensiNonBPAS;
use Illuminate\Http\Request;

class IntervensiNonBPASController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $intervensiNonBPAS = IntervensiNonBPAS::with(['user','bentukintervensi','stunting','kabupatenkota','kecamatan', 'kelurahandesa'])
            // ->where('USER_ID', 'like', '%' . request('user_id') . '%')
            // ->where('BENTUK_INTERVENSI_ID', 'like', '%' . request('bentuk_intervensi_id') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.intervensis.nonbpas.index', compact('intervensiNonBPAS'));
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
    public function show(IntervensiNonBPAS $intervensiNonBPAS)
    {
        return view('pages.intervensis.nonbpas.show', compact('intervensiNonBPAS'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IntervensiNonBPAS $intervensiNonBPAS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IntervensiNonBPAS $intervensiNonBPAS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IntervensiNonBPAS $intervensiNonBPAS)
    {
        $intervensiNonBPAS->delete();
        return redirect()->route('intervensi-nonbpas.index')->with('success', 'Intervensi Data berhasil dihapus');
    }
}
