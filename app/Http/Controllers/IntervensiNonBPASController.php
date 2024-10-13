<?php

namespace App\Http\Controllers;

use App\Models\Stunting;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\Kabupatenkota;
use App\Models\Kelurahandesa;
use App\Models\BentukIntervensi;
use App\Models\DetailIntervensi;
use App\Models\DetailIntervensiNon;
use App\Models\IntervensiNonBPAS;
use App\Models\User;

class IntervensiNonBPASController extends Controller
{
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
        $stuntings = Stunting::all();
        $users = User::all();
        $bentukIntervensis = BentukIntervensi::where('INTERVENSI_ID', 1)->get();
        $detailIntervensi = DetailIntervensi::all();
        $kabupatenkota = Kabupatenkota::all();
        $kecamatan = Kecamatan::all();
        $kelurahandesa = Kelurahandesa::all();
        return view('pages.intervensis.nonbpas.create-intervensi', compact('stuntings', 'users','bentukIntervensis', 'detailIntervensi','kabupatenkota', 'kecamatan', 'kelurahandesa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'USER_ID' => 'required',
            'BENTUK_INTERVENSI_ID' => 'required',
            'STUNTING_ID' => 'required',
            'STATUS' => 'nullable|in:Proses,Pending'
        ]);

        $intervensiNonBPAS = IntervensiNonBPAS::create($request->only([
            'USER_ID',
            'BENTUK_INTERVENSI_ID',
            'STUNTING_ID',
            'STATUS'
        ]));

        if ($intervensiNonBPAS) {
            return redirect()->route('intervensi-nonbpas.index')->with('success', 'Data Intervensi berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data Intervensi.');
        }
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


    public function addDetailIntervensi(Request $request, $id)
    {
        $intervensiNonBPAS = IntervensiNonBPAS::findOrFail($id);
        $bentukIntervensis = BentukIntervensi::get();
        $addDetailIntervensis = DetailIntervensiNon::get();
        // $anggarans = $intervensiBPAS->detailIntervensi;
        return view('pages.intervensis.nonbpas.add-detail',compact('intervensiNonBPAS','bentukIntervensis','addDetailIntervensis'));
    }

    public function storeDetailIntervensi(Request $request, $id)
    {
        try {
            $request->validate([
                'FOTO_ANAK' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
                'DOKUMENTASI' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
                // 'ANGGARAN' => 'nullable|in:APBD,NON APBD,LAINNYA',
                'KETERANGAN' => 'nullable|string|max:255',
            ]);
        } catch (\Throwable $th) {
            // dd($th);
        }
        

        $detailIntervensi = IntervensiNonBPAS::findOrFail($id);

        $detailIntervensi = new DetailIntervensiNon();
        $detailIntervensi->INTERVENSI_NON_BPAS_ID = $id;
        $detailIntervensi->ANGGARAN = $request->ANGGARAN;
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

        return redirect()->route('intervensi-nonbpas.index')->with('success', 'Data Detail Intervensi berhasil ditambahkan.');
    }

    public function destroydetailIntervensi($id)
    {
        $detailIntervensi = DetailIntervensi::find($id);
        $detailIntervensi->delete();
        return redirect()->route('intervensi-nonbpas.detail')->with('success', 'Data berhasil dihapus');
    }
}
