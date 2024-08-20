<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StuntingController;
use App\Http\Controllers\BapakAsuhController;
use App\Http\Controllers\IntervensiController;
use App\Http\Controllers\AnakAsuhController;
use App\Models\Intervensi;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard');
    })->name('home');

    Route::resource('stuntings', StuntingController::class);
    Route::resource('bapakasuhs', BapakAsuhController::class);
    // Route::resource('intervensis', IntervensiController::class);

    Route::get('/intervensi', [IntervensiController::class, 'index'])->name('intervensi.index');
    Route::get('/intervensi/create', [IntervensiController::class, 'create'])->name('intervensis.create');
    Route::post('/intervensi', [IntervensiController::class, 'store'])->name('bentuk_intervensi.store');
    Route::get('/intervensi/{id}', [IntervensiController::class, 'show'])->name('intervensi.show');
    Route::put('/intervensi/{id}', [IntervensiController::class, 'update'])->name('bentuk_intervensi.update');
    Route::get('/intervensi/{id}', [IntervensiController::class, 'edit'])->name('intervensi.edit');
    Route::get('/intervensi/{id}/destroy', [IntervensiController::class, 'destroy'])->name('intervensi.destroy');

    Route::get('intervensis/create-jenis', [IntervensiController::class, 'createJenisIntervensi'])->name('intervensis.createJenisIntervensi');
    Route::post('intervensis/store-jenis', [IntervensiController::class, 'storeJenisIntervensi'])->name('intervensis.storeJenisIntervensi');

    Route::resource('anakasuhs', AnakAsuhController::class);

    //Intervensi BPAS
    // Route::get(('intervensis/intervensi-bpas',[IntervensiController::class,''])->name(''));

    //Intervensi Non BPAS
    // Route::get(('intervensis/intervensi-nonbpas',[IntervensiController::class,''])->name(''));

    Route::post('/stunting-import', [StuntingController::class, 'import'])->name('stunting.import');

});
