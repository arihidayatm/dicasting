<?php

use App\Models\Intervensi;
use App\Exports\StuntingExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\AnakAsuhController;
use App\Http\Controllers\StuntingController;
use App\Http\Controllers\BapakAsuhController;
use App\Http\Controllers\IntervensiController;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard');
    })->name('home');

    Route::resource('balitas', BalitaController::class);

    // Route::get('/users',[UserController::class, 'index'])->name('users.index');
    Route::resource('users', UserController::class);

    // Route untuk menampilkan daftar Stunting
    Route::get('/stuntings', [StuntingController::class, 'index'])->name('stuntings.index');

    // Route untuk menampilkan form penambahan Stunting baru
    Route::get('/stuntings/create', [StuntingController::class, 'create'])->name('stuntings.create');

    // Route untuk menyimpan data Stunting baru
    Route::post('/stuntings', [StuntingController::class, 'store'])->name('stuntings.store');

    // Route untuk menampilkan form edit Stunting
    Route::get('/stuntings/{id}/edit', [StuntingController::class, 'edit'])->name('stuntings.edit');

    // Route untuk memperbarui data Stunting
    Route::put('/stuntings/{id}', [StuntingController::class, 'update'])->name('stuntings.update');

    // Route untuk menghapus data Stunting
    Route::delete('/stuntings/{id}', [StuntingController::class, 'destroy'])->name('stuntings.destroy');



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

    Route::get('/stunting-export',[StuntingController::class, 'export'])->name('stunting.export');
    Route::post('/stunting-import', [StuntingController::class, 'import'])->name('stunting.import');

});
