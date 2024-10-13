<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Stunting;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\IntervensiBPAS;
use App\Models\DetailIntervensi;
use App\Models\IntervensiNonBPAS;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $laporanStuntings = Stunting::with('kecamatan', 'kelurahandesa')
            ->where('NAMA_BALITA', 'like', '%' . request('nama_balita') . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.laporan.index', compact('laporanStuntings'));
    }

    public function balitaresiko()
    {
        // Get Data Balita
        $laporanBalita = Balita::get();
        return view('pages.laporan.balitaresiko', compact('laporanBalita'));
    }

    public function kasusaktif()
    {
        return view('pages.laporan.kasusaktif');
    }

    public function kasussembuh()
    {
        return view('pages.laporan.kasussembuh');
    }

    public function kasusmeninggal()
    {
        return view('pages.laporan.kasusmeninggal');
    }

    public function kasusbelumintervensi()
    {
        return view('pages.laporan.kasusbelumintervensi');
    }

    public function bukuStunting(Request $request)
    {
        $laporanStuntings = Stunting::with('kecamatan', 'puskesmas','kelurahandesa')
            ->where('NAMA_BALITA', 'like', '%' . request('nama_balita') . '%')
            ->whereHas('kecamatan', function ($query) {
                $query->where('NAMA_KECAMATAN', 'like', '%' . request('nama_kecamatan') . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.laporan.bukustunting', [
            'laporanStuntings' => $laporanStuntings,
            'stuntings' => Stunting::all(),
            'kecamatans' => Kecamatan::all(),
            'url' => $request->url() . '?' . $request->getQueryString(),
        ]);
    }

    public function showbukuStunting($id)
    {
        $dataStunting = Stunting::where('id', $id)->get();
        $intervensi = IntervensiBPAS::find($id);
        $detailIntervensis = IntervensiBPAS::where('STUNTING_ID', $id)->get();
        
        $laporan = DetailIntervensi::where('intervensibpas_id', COUNT($detailIntervensis)>0 ? $detailIntervensis[0]->id : null)->get();

        return view('pages.laporan.showbukustunting', [
            'dataStunting' => $dataStunting,
            'intervensi' => $intervensi,
            'laporan' => $laporan,
            'detailIntervensis' => $detailIntervensis,
        ]);
    }


}
