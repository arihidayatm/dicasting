<?php

namespace App\Http\Controllers;

use App\Models\Stunting;
use App\Models\BapakAsuh;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\Kabupatenkota;
use App\Models\Kelurahandesa;
use App\Models\IntervensiBPAS;
use App\Models\BentukIntervensi;
use App\Models\DetailIntervensi;

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
    public function create(Request $request)
    {
        $stuntings = Stunting::all();
        $bapakasuhs = BapakAsuh::all();
        $bentukIntervensis = BentukIntervensi::where('INTERVENSI_ID', 2)->get();
        $detailIntervensi = DetailIntervensi::all();
        $kabupatenkota = Kabupatenkota::all();
        $kecamatan = Kecamatan::all();
        $kelurahandesa = Kelurahandesa::all();
        return view('pages.intervensis.bpas.create-intervensi', compact('stuntings', 'bapakasuhs', 'bentukIntervensis', 'detailIntervensi','kabupatenkota', 'kecamatan', 'kelurahandesa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'STUNTING_ID' => 'required',
            'BAPAKASUH_ID' => 'required',
            'BENTUK_INTERVENSI_ID' => 'required',
            'STATUS' => 'nullable|in:Proses,Pending'
        ]);

        $intervensiBPAS = IntervensiBPAS::create($request->only([
            'BAPAKASUH_ID',
            'STUNTING_ID',
            'BENTUK_INTERVENSI_ID',
            'STATUS'
        ]));

        if ($intervensiBPAS) {
            return redirect()->route('intervensi-bpas.index')->with('success', 'Data Intervensi oleh BASUH berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data Intervensi oleh BASUH.');
        }
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
    public function destroy($id)
    {
        $intervensiBPAS = IntervensiBPAS::findOrFail($id);
        $intervensiBPAS->delete();
        return redirect()->route('intervensi-bpas.index')->with('success', 'Data Intervensi Oleh Bapak Ibu Asuh berhasil dihapus');
    }

    public function addDetailIntervensi(Request $request, $id)
    {
        $intervensiBPAS = IntervensiBPAS::findOrFail($id);
        $bentukIntervensis = BentukIntervensi::get();
        $addDetailIntervensis = DetailIntervensi::get();
        $anggarans = $intervensiBPAS->detailIntervensi;
        return view('pages.intervensis.bpas.add-detail',compact('intervensiBPAS','bentukIntervensis','addDetailIntervensis','anggarans'));
    }

    public function storeDetailIntervensi(Request $request, $id)
    {
        try {
            $request->validate([
                'TGL_INTERVENSI' => 'required|date',
                'FOTO_ANAK' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
                'DOKUMENTASI' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
                'ANGGARAN' => 'nullable|string|max:255',
                'NOMINAL_ANGGARAN' => 'nullable|string|max:255',
                'KETERANGAN' => 'nullable|string|max:255',
            ]);
        } catch (\Throwable $th) {
            // dd($th);
        }
        

        $detailIntervensi = IntervensiBPAS::findOrFail($id);

        $detailIntervensi = new DetailIntervensi();
        $detailIntervensi->INTERVENSIBPAS_ID = $id;
        $detailIntervensi->TGL_INTERVENSI = $request->TGL_INTERVENSI;
        $detailIntervensi->ANGGARAN = $request->ANGGARAN;
        $detailIntervensi->NOMINAL_ANGGARAN = $request->NOMINAL_ANGGARAN;
        $detailIntervensi->KETERANGAN = $request->KETERANGAN;

        $path = 'public/foto_anak';
        
        if ($request->file('FOTO_ANAK')) {
            $imageName = time().'.'.$request->file('FOTO_ANAK')->extension();
            $request->file('FOTO_ANAK')->storeAs($path, $imageName);
            $detailIntervensi->FOTO_ANAK = $imageName;
        }

        $path = 'public/dokumentasi';
        if ($request->file('DOKUMENTASI')) {
            $imageName = time().'.'.$request->file('DOKUMENTASI')->extension();
            $request->file('DOKUMENTASI')->storeAs($path, $imageName);
            $detailIntervensi->DOKUMENTASI = $imageName;
        }

        $detailIntervensi->save();

        return redirect()->route('intervensi-bpas.index')->with('success', 'Data Detail Intervensi berhasil ditambahkan.');
    }

    public function destroydetailIntervensi($id)
    {
        $detailIntervensi = DetailIntervensi::find($id);
        $detailIntervensi->delete();
        return redirect()->route('intervensi-bpas.detail')->with('success', 'Data berhasil dihapus');
    }
}
