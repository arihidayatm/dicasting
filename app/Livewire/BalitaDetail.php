<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Balita;

class BalitaDetail extends Component
{
    public function render()
    {
        return view('livewire.balita-detail');
    }

    public $balita;

    public function mount($id)
    {
        $this->balita = Balita::find($id);
    }

    //fungsi store balita dengan ID = 1
    public function store()
    {
        $this->balita = Balita::find($this->balita->id);
        return redirect()->route('balitas.store', $this->balita->id);
    }

    //fungsi edit balita dengan ID = 1
    public function edit($id)
    {
        $this->balita = Balita::find($id);
        return redirect()->route('balitas.edit', $this->balita->id);
    }

    //fungsi hapus balita dengan ID = 1
    public function delete($id)
    {
        $this->balita = Balita::find($id);
        $this->balita->delete();
        return redirect()->route('balitas.delete', $this->balita->id);
    }

    //fungsi jika memilih KECAMATAN_ID = 137301 jadi pilihan PUSKESMAS_ID = 3 dengan ID_PUSKESMAS = P1373020202
    public function getPuskesmasByKecamatan($kecamatan_id)
    {
        $puskesmas = Balita::where('KECAMATAN_ID', $kecamatan_id)->get();
        return response()->json($puskesmas);
    }

    // fungsi jika memilih kecamatan_id = 137304 jadi pilihan kelurahandesa_id dengan ID = 1373042001, 1373042002, 1373042003, 1373042004, 1373042005, 1373042006, 1373042007, 1373042008, 1373042009, 1373042010, 1373042011
    public function getKelurahandesaByKecamatan($kecamatan_id)
    {
        $kelurahandesas = Balita::where('KECAMATAN_ID', $kecamatan_id)->get();
        return response()->json($kelurahandesas);
    }

    // fungsi jika memilih kelurahandesa_id = 1373042001 jadi pilihan ID_POSYANDU = P1373040101150111, P1373040101150115, P1373040101148070, P1373040101148449, P1373040101150119, P1373040101147986, P1373040101148266
    public function getPosyanduByKelurahandesa($kelurahandesa_id)
    {
        $posyandus = Balita::where('KELURAHANDESA_ID', $kelurahandesa_id)->get();
        return response()->json($posyandus);
    }


}
