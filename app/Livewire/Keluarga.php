<?php

namespace App\Livewire;

use App\Models\Keluarga as ModelsKeluarga;
use Livewire\Component;
use Livewire\WithPagination;

class Keluarga extends Component
{
    use WithPagination;
    public function render(Keluarga $request)
    {
        // dd($keluargas);
        $keluargas = ModelsKeluarga::with('balita')->paginate(10);
        return view('livewire.keluarga')->with('keluargas', $keluargas);
        // , [
        //     'keluargas' => Keluarga::paginate(10),
        // ]);
    }
    public function delete($id)
    {
        $keluarga = ModelsKeluarga::find($id);
        $keluarga->delete();
    }
}
