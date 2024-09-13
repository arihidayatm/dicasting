<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Stunting;

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
}
