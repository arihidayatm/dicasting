<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Balita;
use App\Models\Stunting;
use App\Models\BapakAsuh;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\IntervensiBPAS;
use Illuminate\Support\Carbon;
use App\Models\DetailIntervensi;
use App\Models\IntervensiNonBPAS;
use App\Models\StuntingPengukuran;
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
        $laporanBalitaresiko = Stunting::with('kecamatan', 'kelurahandesa')
            ->where('STATUS_TBU', 'like', '%' . request('status_tbu') . '%')
            ->whereHas('kecamatan',function($query) {
                $query->where('NAMA_KECAMATAN', 'like', '%' . request('nama_kecamatan') . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Get Data Stunting dengan STATUS_TBU = 'Sangat Pendek'
        // $stuntingTBU = Stunting::where('STATUS_TBU', 'Sangat Pendek')->get();
        $countResikoStuntingSangatPendek = Stunting::where('STATUS_TBU', 'Sangat Pendek')->count();
        $countResikoStuntingPendek = Stunting::where('STATUS_TBU', 'Pendek')->count();

        return view('pages.laporan.balitaresiko', [
            'kecamatan' => Kecamatan::all(),
            'laporanBalitaresiko' => $laporanBalitaresiko,
            // 'stuntingTBU' => $stuntingTBU
            'countResikoStuntingSangatPendek' => $countResikoStuntingSangatPendek,
            'countResikoStuntingPendek' => $countResikoStuntingPendek
        ]);
    }

    public function kasusaktif()
    {
        $laporanStuntings = Stunting::with('kecamatan', 'kelurahandesa')
            ->where('NAMA_BALITA', 'like', '%' . request('nama_balita') . '%')
            ->whereHas('kecamatan',function($query) {
                $query->where('NAMA_KECAMATAN', 'like', '%' . request('nama_kecamatan') . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.laporan.kasusaktif', [
            'kecamatan'=> Kecamatan::all(),
            'laporanStuntings'=> $laporanStuntings
        ]);
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
        $laporanbelumIntervensi = Stunting::with('kecamatan', 'kelurahandesa')
            ->where('NAMA_BALITA', 'like', '%' . request('nama_balita') . '%')
            ->whereHas('kecamatan', function($query) {
                $query->where('NAMA_KECAMATAN', 'like', '%' . request('nama_kecamatan') . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.laporan.kasusbelumintervensi', [
            'kecamatan'=> Kecamatan::all(),
            'laporanbelumIntervensi'=> $laporanbelumIntervensi
        ]);
    }

    public function wisudaStunting()
    {
        $wisudaStuntings = Stunting::with('kecamatan', 'kelurahandesa')
            ->where('NAMA_BALITA', 'like', '%' . request('nama_balita') . '%')
            ->whereRaw('TIMESTAMPDIFF(YEAR, TGL_LAHIR, CURDATE()) >= 5')
            ->whereHas('kecamatan', function($query) {
                $query->where('NAMA_KECAMATAN', 'like', '%' . request('nama_kecamatan') . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pages.laporan.wisudaStunting',[
            'kecamatan' => Kecamatan::all(),
            'wisudaStuntings' => $wisudaStuntings,

        ]);
    }

    public function bukuStunting(Request $request)
    {
        $laporanStuntings = Stunting::with('kecamatan', 'puskesmas','kelurahandesa','bapakasuh')
            ->where('NAMA_BALITA', 'like', '%' . request('nama_balita') . '%')
            ->whereHas('kecamatan', function ($query) {
                $query->where('NAMA_KECAMATAN', 'like', '%' . request('nama_kecamatan') . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        // $totalIntervensiSpesifik = Stunting::whereHas('countBentukIntervensiSpesifikDanSensitif', function ($query) {
        //     $query->where('JENIS_INTERVENSI', 1);
        // })->count();

        // $totalIntervensiSensitif = Stunting::whereHas('countBentukIntervensiSpesifikDanSensitif', function ($query) {
        //     $query->where('JENIS_INTERVENSI', 2);
        // })->count();

        return view('pages.laporan.bukustunting', [
            'laporanStuntings' => $laporanStuntings,
            // 'totalIntervensiSpesifik' => $totalIntervensiSpesifik,
            // 'totalIntervensiSensitif' => $totalIntervensiSensitif,
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

        $riwayatPertumbuhanAnak = StuntingPengukuran::whereHas('stuntings', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();



        return view('pages.laporan.showbukustunting', [
            'dataStunting' => $dataStunting,
            'riwayatPertumbuhanAnak' => $riwayatPertumbuhanAnak,
            'intervensi' => $intervensi,
            'laporan' => $laporan,
            'detailIntervensis' => $detailIntervensis,
        ]);
    }


}
