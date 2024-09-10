<?php

namespace App\Http\Controllers;

use App\Models\BulanLap;
use App\Models\ePPGBM;
use App\Models\TahunLap;
use Illuminate\Http\Request;

class ePPGBMController extends Controller
{
    public function index(Request $request)
    {
        // $dataeppgbm = ePPGBM::all();
        $lapTahun = TahunLap::all();
        $lapBulan = BulanLap::when($request->tahun_id, function ($query) use ($request) {
            return $query->where('TAHUN_ID', $request->tahun_id);
        })->get();
        $dataeppgbm = ePPGBM::when($request->tahun_id, function ($query) use ($request) {
            return $query->where('TAHUN_ID', $request->tahun_id);
        })->when($request->bulan_id, function ($query) use ($request) {
            return $query->where('BULAN_ID', $request->bulan_id);
        })->get();
        if ($request->tahun_id && $request->bulan_id) {
            $dataeppgbm = ePPGBM::where('TAHUN_ID', $request->tahun_id)->where('BULAN_ID', $request->bulan_id)->get();
        }

        return view('pages.stuntings.eppgbm')->with('dataeppgbm', $dataeppgbm)->with('lapTahun', $lapTahun)->with('lapBulan', $lapBulan);
    }
}
