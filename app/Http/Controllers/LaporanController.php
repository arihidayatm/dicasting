<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Stunting;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $laporanBalita = Balita::get();
        $laporanStunting = Stunting::get();
        return view('pages.laporan.index', compact('laporanBalita', 'laporanStunting'));
    }

    public function balitaresiko()
    {
        // Get Data Balita

        return view('pages.laporan.balitaresiko');
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

    public function bukuStunting()
    {
        return view('pages.laporan.bukustunting');
    }


}
