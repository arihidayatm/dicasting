<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Paud extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $id_paud;
    public $nama_paud;
    public $alamat_paud;
    public $notelp_paud;

    public function mount()
    {
        // $this->id_paud = \App\Models\Paud::all();
    }

    public function render()
    {
        $pauds = \App\Models\Paud::paginate(5);
        return view('livewire.kota.paud',
            [
                'pauds' => $pauds
            ]);
    }
}
