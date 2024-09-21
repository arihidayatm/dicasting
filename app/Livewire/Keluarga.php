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
    public $nohp;
    public $keluarga_id;

    public function mount()
    {
        // dd($keluarga);
    }

    public function render()
    {
        $keluargas = ModelsKeluarga::paginate(10);
        return view('livewire.keluarga', [
            'keluargas' => $keluargas
        ]);
    }

    public function show($keluarga_id)
    {
        $this->emit('showKeluarga', $keluarga_id);
    }

    public function showCreateModal()
    {
        $this->resetInputFields();
        $this->dispatchBrowserEvent('open-create-modal');
    }

    public function createDataKeluarga()
    {
        $this->validate([
            'no_kk' => 'required',
            'nik_ayah' => 'required',
            'nama_ayah' => 'required',
            'nik_ibu' => 'required',
            'nama_ibu' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
        ]);

        Keluarga::create([
            'no_kk' => $this->no_kk,
            'nik_ayah' => $this->nik_ayah,
            'nama_ayah' => $this->nama_ayah,
            'nik_ibu' => $this->nik_ibu,
            'nama_ibu' => $this->nama_ibu,
            'alamat' => $this->alamat,
            'nohp' => $this->nohp,
        ]);

        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-create-modal');
        $this->emit('refreshData');
    }

    public function showEditModal($id)
    {
        $this->resetInputFields();
        $this->keluarga_id = $id;
        $this->dispatchBrowserEvent('open-edit-modal');
        $this->loadData();
    }

    public function loadData()
    {
        $keluarga = Keluarga::find($this->keluarga_id);
        $this->no_kk = $keluarga->no_kk;
        $this->nik_ayah = $keluarga->nik_ayah;
        $this->nama_ayah = $keluarga->nama_ayah;
        $this->nik_ibu = $keluarga->nik_ibu;
        $this->nama_ibu = $keluarga->nama_ibu;
        $this->alamat = $keluarga->alamat;
        $this->nohp = $keluarga->nohp;
    }

    public function updateDataKeluarga()
    {
        $this->validate([
            'no_kk' => 'required',
            'nik_ayah' => 'required',
            'nama_ayah' => 'required',
            'nik_ibu' => 'required',
            'nama_ibu' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
        ]);

        $keluarga = Keluarga::find($this->keluarga_id);
        $keluarga->update([
            'no_kk' => $this->no_kk,
            'nik_ayah' => $this->nik_ayah,
            'nama_ayah' => $this->nama_ayah,
            'nik_ibu' => $this->nik_ibu,
            'nama_ibu' => $this->nama_ibu,
            'alamat' => $this->alamat,
            'nohp' => $this->nohp,
        ]);

        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-edit-modal');
        $this->emit('refreshData');
    }
}
