<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Stunting;
use App\Models\StuntingPengukuran;

class StuntingDetail extends Component
{
    public function render()
    {
        return view('livewire.stunting-detail');
    }

    public $stunting;

    public function mount($id)
    {
        $this->stunting = Stunting::find($id);
    }

    public function edit($id)
    {
        $this->stunting = Stunting::find($id);
        return redirect()->route('stuntings.edit', $this->stunting->id);
    }

    public function dataPertumbuhan($id)
    {
        $this->stunting = StuntingPengukuran::find($id);
        return redirect()->route('stuntings.data-pertumbuhan', $this->stunting->id);
    }
}
