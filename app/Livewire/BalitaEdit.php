<?php

namespace App\Livewire;

use App\Models\Balita;
use Livewire\Component;

class BalitaEdit extends Component
{
    public function render()
    {
        return view('livewire.balita-edit');
    }

    public $balita;

    public function edit()
    {
        return redirect()->route('balitas.edit', $this->balita->id);
    }

    public function mount($id)
    {
        $this->balita = Balita::find($id);
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
