<?php

namespace App\Livewire;

use App\Models\Kecamatan;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Keluarga as ModelsKeluarga;
use App\Models\Kelurahandesa;

class Keluarga extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $no_kk;
    public $nik_ayah;
    public $nama_ayah;
    public $nik_ibu;
    public $nama_ibu;
    public $alamat;
    public $rt;
    public $rw;
    // public $kabupatenkota_id;
    public $kecamatan_id;
    public $kelurahandesa_id;
    public $kodepos;
    public $nohp;
    public $keluarga_id;

    public function mount()
    {
        // dd($keluarga);
        // $this->kabupatenkota_id = Kabupatenkota::all();
        $this->kecamatan_id = Kecamatan::all();
        $this->kelurahandesa_id = Kelurahandesa::all();
    }

    public function store()
    {
        $this->validate([
            'no_kk' => 'required|unique:keluarga,no_kk',
            'nik_ayah' => 'required',
            'nama_ayah' => 'required',
            'nik_ibu' => 'required',
            'nama_ibu' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            // 'kabupatenkota_id' => 'required',
            'kecamatan_id' => 'required',
            'kelurahandesa_id' => 'required',
            'kodepos' => 'required',
            'nohp' => 'required',
        ]);

        ModelsKeluarga::create([
            'no_kk' => $this->no_kk,
            'nik_ayah' => $this->nik_ayah,
            'nama_ayah' => $this->nama_ayah,
            'nik_ibu' => $this->nik_ibu,
            'nama_ibu' => $this->nama_ibu,
            'alamat' => $this->alamat,
            'rt' => $this->rt,
            'rw' => $this->rw,
            // 'kabupatenkota_id' => $this->kabupaten,
            'kecamatan_id' => $this->kecamatan,
            'kelurahandesa_id' => $this->kelurahan,
            'kodepos' => $this->kodepos,
            'nohp' => $this->nohp,
        ]);
        $this->reset();
    }

    // public function edit($id)
    // {
    //     $keluarga = ModelsKeluarga::find($id);
    //     $this->keluarga_id = $keluarga->id;
    //     $this->no_kk = $keluarga->no_kk;
    //     $this->nik_ayah = $keluarga->nik_ayah;
    //     $this->nama_ayah = $keluarga->nama_ayah;
    //     $this->nik_ibu = $keluarga->nik_ibu;
    //     $this->nama_ibu = $keluarga->nama_ibu;
    //     $this->alamat = $keluarga->alamat;
    //     $this->rt = $keluarga->rt;
    //     $this->rw = $keluarga->rw;
    //     // $this->kabupatenkota_id = $keluarga->kabupatenkota_id;
    //     // $this->kecamatan_id = $keluarga->kecamatan_id;
    //     // $this->kelurahandesa_id = $keluarga->kelurahandesa_id;
    //     $this->kodepos = $keluarga->kodepos;
    //     $this->nohp = $keluarga->nohp;

    //     $this->emit('showEditModal');
    // }

    // public function cancel()
    // {
    //     $this->resetInputFields();
    //     $this->emit('showEditModal');
    // }

    // public function update()
    // {
    //     $this->validate([
    //         'no_kk' => 'required',
    //         'nik_ayah' => 'required',
    //         'nama_ayah' => 'required',
    //         'nik_ibu' => 'required',
    //         'nama_ibu' => 'required',
    //         'alamat' => 'required',
    //         'rt' => 'required',
    //         'rw' => 'required',
    //         // 'kabupaten' => 'required',
    //         'kecamatan_id' => 'required',
    //         'kelurahan' => 'required',
    //         'kodepos' => 'required',
    //         'nohp' => 'required',
    //     ]);

    //     if ($this->keluarga_id) {
    //         $keluarga = ModelsKeluarga::find($this->keluarga_id);
    //         $keluarga->update([
    //             'no_kk' => $this->no_kk,
    //             'nik_ayah' => $this->nik_ayah,
    //             'nama_ayah' => $this->nama_ayah,
    //             'nik_ibu' => $this->nik_ibu,
    //             'nama_ibu' => $this->nama_ibu,
    //             'alamat' => $this->alamat,
    //             'rt' => $this->rt,
    //             'rw' => $this->rw,
    //             // 'kabupatenkota_id' => $this->kabupatenkota_id,
    //             'kecamatan_id' => $this->kecamatan_id,
    //             'kelurahandesa_id' => $this->kelurahandesa_id,
    //             'kodepos' => $this->kodepos,
    //             'nohp' => $this->nohp,
    //         ]);

    //         session()->flash('message', 'Data Keluarga Berhasil Diupdate.');
    //         $this->resetInputFields();
    //         $this->emit('keluargaUpdated');
    //     }
    // }

    public function delete($id)
    {
        ModelsKeluarga::find($id)->delete();
    }

    public function render()
    {
        $keluargas = ModelsKeluarga::paginate(10);
        // $kabupatenkotas = ModelsKeluarga::all();
        $kecamatans = Kecamatan::all();
        $kelurahandesas = Kelurahandesa::all();
        return view('livewire.keluarga.keluarga', [
            'keluargas' => $keluargas,
            // 'kabupatenkotas' => $kabupatenkotas,
            'kecamatans' => $kecamatans,
            'kelurahandesas' => $kelurahandesas,
        ]);
    }

}
