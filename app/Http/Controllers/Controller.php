<?php

namespace App\Http\Controllers;

use App\Models\BapakAsuh;

abstract class Controller
{
    // Controller
    public function dashboard()
    {
        $bapakasuhs = BapakAsuh::all(); // contoh query untuk mendapatkan data bapak asuh
        return view('dashboard', compact('bapakasuhs'));
    }
}
