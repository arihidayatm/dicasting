<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kecamatan as KecamatanModel;


class Kecamatan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $kecamatan_id;
    public $kabupatenkota_id = [];
    public $id_kecamatan_bps;
    public $nama_kecamatan;

    public function mount()
    {
        //dd($kecamatans);
        $this->kecamatan_id = \App\Models\Kecamatan::all();
        $this->kabupatenkota_id = \App\Models\Kabupatenkota::all();
    }

    // public function storeKecamatan()
    // {
    //     $this->validate([
    //         'id_kecamatan_bps' => 'required|unique:kecamatans,id_kecamatan_bps',
    //         'nama_kecamatan' => 'required',
    //     ]);

    //     $kecamatan = new Kecamatan();
    //     $kecamatan->id_kecamatan_bps = $this->id_kecamatan_bps;
    //     $kecamatan->nama_kecamatan = $this->nama_kecamatan;
    //     $kecamatan->kabupatenkota_id = $this->kabupatenkota_id;
    //     $kecamatan->save();
    //     $this->reset();
    // }

    public function render()
    {
        $kecamatans = KecamatanModel::paginate(5);
        return view('livewire.kota.kecamatan', [
            'kecamatans' => $kecamatans
        ]);
    }
}
