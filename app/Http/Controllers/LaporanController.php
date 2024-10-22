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
        // Get Data Balita
        $laporanBalita = Balita::get();
        return view('pages.laporan.balitaresiko', compact('laporanBalita'));
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
            ->whereHas('kecamatan', function($query) {
                $query->where('NAMA_KECAMATAN', 'like', '%' . request('nama_kecamatan') . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        // hitung $umur dari TGL_LAHIR ke hari ini
        $umur = function($stunting) {
            $tglLahir = new DateTime($stunting->TGL_LAHIR);
            $now = new DateTime('now');
            $umur = $now->diff($tglLahir);
            return $umur;  
        };
        // dd($umur);

        $statusWisudaStuntings = $wisudaStuntings->filter(function($stunting) use ($umur) {
            return $umur($stunting) == '5 Tahun 0 Bulan 0 Hari';
        })->map(function($stunting) {
            $stunting->STATUS = 'Ultah';
            return $stunting;
        });
        // dd($statusWisudaStuntings);

        return view('pages.laporan.wisudaStunting',[
            'wisudaStuntings' => $wisudaStuntings,
            'umur' => $umur,
            'kecamatan' => Kecamatan::all(),
            'statusWisudaStuntings' => $statusWisudaStuntings

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
