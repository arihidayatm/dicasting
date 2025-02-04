<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kelurahandesa as KelurahandesaModel;

class Kelurahandesa extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $kecamatan_id;
    public $id_kelurahan_bps;
    public $nama_kelurahandesa;

    public function mount()
    {
        $this->kecamatan_id = \App\Models\Kecamatan::all();
    }

    public function render()
    {
        $kelurahandesas = KelurahandesaModel::paginate(5);
        return view('livewire.kota.kelurahandesa',
            [
                'kelurahandesas' => $kelurahandesas
            ]);
    }
}
