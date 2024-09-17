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

    public function edit()
    {
        return redirect()->route('balitas.edit', $this->balita->id);
    }

    public function update()
    {
        $this->balita->save();
        return redirect()->route('balitas.index');
    }

    public function delete()
    {
        $this->balita->delete();
        return redirect()->route('balitas.index');
    }
}
