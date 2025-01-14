<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Keluarga as ModelsKeluarga;

class Keluarga extends Component
{
    use WithPagination;

    public $no_kk;
    public $nik_ayah;
    public $nama_ayah;
    public $nik_ibu;
    public $nama_ibu;
    public $alamat;
    public $rt;
    public $rw;
    public $kabupaten;
    public $kecamatan;
    public $kelurahan;
    public $kodepos;
    public $nohp;
    public $keluarga_id;

    public function mount()
    {
        // dd($keluarga);
    }

    public function render()
    {
        $keluargas = ModelsKeluarga::paginate(10);
        $kabupatenkotas = ModelsKeluarga::all();
        $kecamatans = ModelsKeluarga::all();
        $kelurahandesas = ModelsKeluarga::all();
        return view('livewire.keluarga', [
            'keluargas' => $keluargas,
            'kabupatenkotas' => $kabupatenkotas,
            'kecamatans' => $kecamatans,
            'kelurahandesas' => $kelurahandesas,
        ]);
    }

    public function show($keluarga_id)
    {
        $this->emit('showKeluarga', $keluarga_id);
    }

    //Here, we will write render(), resetInputFields(), store(), edit(), cancel(), update() and delete() method for our crud app.
    public function resetInputFields()
    {
        $this->no_kk = '';
        $this->nik_ayah = '';
        $this->nama_ayah = '';
        $this->nik_ibu = '';
        $this->nama_ibu = '';
        $this->alamat = '';
        $this->rt = '';
        $this->rw = '';
        // $this->kabupaten = '';
        $this->kecamatan = '';
        $this->kelurahan = '';
        $this->kodepos = '';
        $this->nohp = '';
    }

    public function store()
    {
        $this->validate([
            'no_kk' => 'required',
            'nik_ayah' => 'required',
            'nama_ayah' => 'required',
            'nik_ibu' => 'required',
            'nama_ibu' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            // 'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
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
            // 'kabupaten' => $this->kabupaten,
            'kecamatan' => $this->kecamatan,
            'kelurahan' => $this->kelurahan,
            'kodepos' => $this->kodepos,
            'nohp' => $this->nohp,
        ]);

        session()->flash('message', 'Data Keluarga Berhasil Disimpan.');
        $this->resetInputFields();
        $this->emit('keluargaStored');
    }

    public function edit($id)
    {
        $keluarga = ModelsKeluarga::find($id);
        $this->keluarga_id = $keluarga->id;
        $this->no_kk = $keluarga->no_kk;
        $this->nik_ayah = $keluarga->nik_ayah;
        $this->nama_ayah = $keluarga->nama_ayah;
        $this->nik_ibu = $keluarga->nik_ibu;
        $this->nama_ibu = $keluarga->nama_ibu;
        $this->alamat = $keluarga->alamat;
        $this->rt = $keluarga->rt;
        $this->rw = $keluarga->rw;
        // $this->kabupaten = $keluarga->kabupaten;
        $this->kecamatan = $keluarga->kecamatan;
        $this->kelurahan = $keluarga->kelurahan;
        $this->kodepos = $keluarga->kodepos;
        $this->nohp = $keluarga->nohp;

        $this->emit('showEditModal');
    }

    public function cancel()
    {
        $this->resetInputFields();
        $this->emit('showEditModal');
    }

    public function update()
    {
        $this->validate([
            'no_kk' => 'required',
            'nik_ayah' => 'required',
            'nama_ayah' => 'required',
            'nik_ibu' => 'required',
            'nama_ibu' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            // 'kabupaten' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'kodepos' => 'required',
            'nohp' => 'required',
        ]);

        if ($this->keluarga_id) {
            $keluarga = ModelsKeluarga::find($this->keluarga_id);
            $keluarga->update([
                'no_kk' => $this->no_kk,
                'nik_ayah' => $this->nik_ayah,
                'nama_ayah' => $this->nama_ayah,
                'nik_ibu' => $this->nik_ibu,
                'nama_ibu' => $this->nama_ibu,
                'alamat' => $this->alamat,
                'rt' => $this->rt,
                'rw' => $this->rw,
                // 'kabupaten' => $this->kabupaten,
                'kecamatan' => $this->kecamatan,
                'kelurahan' => $this->kelurahan,
                'kodepos' => $this->kodepos,
                'nohp' => $this->nohp,
            ]);

            session()->flash('message', 'Data Keluarga Berhasil Diupdate.');
            $this->resetInputFields();
            $this->emit('keluargaUpdated');
        }
    }

    public function delete($id)
    {
        if ($id) {
            ModelsKeluarga::where('id', $id)->delete();
            session()->flash('message', 'Data Keluarga Berhasil Dihapus.');
        }
    }

}
