<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahandesa;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function kecamatan(Request $request)
    {
        $data = Kecamatan::where('NAMA_KECAMATAN', 'LIKE', '%'. request('q') .'%')
            ->paginate(10);
        // dd($data);
        return response($request)->json($data);
    }

    public function kelurahandesa($id)
    {
        $data = Kelurahandesa::where('KECAMATAN_ID', $id)
            ->where('NAMA_KELURAHANDESA', 'LIKE', '%'. request('q') .'%')
            ->paginate(10);
        return response()->json($data);
    }

}
