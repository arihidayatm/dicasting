<?php

use App\Models\Balita;
use App\Models\Kecamatan;
use App\Livewire\Keluarga;
use App\Livewire\BalitaEdit;
use App\Exports\BalitaExport;
use App\Livewire\BalitaDetail;
use App\Exports\StuntingExport;
use App\Livewire\StuntingDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AnakAsuhController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\StuntingController;
use App\Http\Controllers\BapakAsuhController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PuskesmasController;
use App\Http\Controllers\IntervensiController;
use App\Http\Controllers\NonBapakAsuhController;
use App\Http\Controllers\IntervensiBPASController;
use App\Http\Controllers\IntervensiNonBPASController;
use App\Models\IntervensiNonBPAS;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});

Route::middleware(['auth'])->group(function ()
{
    Route::get('home', function () {
        return view('pages.dashboard');
    })->name('home');



    //MASTERS
    // Route::get('/users',[UserController::class, 'index'])->name('users.index');
    Route::resource('users', UserController::class);
    // Route::get('/user/chart', 'UserController@showChart');

    Route::get('sawahlunto', function(){
        return view('pages.masters.sawahlunto');
    });
    Route::get('selectKecamatan', [KecamatanController::class, 'kecamatan'])->name('kecamatan.index');
    Route::get('selectKelurahandesa/{id}', [KecamatanController::class, 'kelurahandesa']);

    Route::resource('balitas', BalitaController::class);
    Route::get('/balitas', [BalitaController::class, 'index'])->name('balita.index');
    // Route::get('/balitas/create', [BalitaController::class, 'create'])->name('balita.create');
    // Route::post('/balitas', [BalitaController::class, 'store'])->name('balita.store');
    Route::get('/balitas/{id}', [BalitaController::class, 'show'])->name('balita.show');
    // Route::get('/balitas/{id}/edit', [BalitaController::class, 'edit'])->name('balita.edit');
    // Route::patch('/balitas/{id}', [BalitaController::class, 'update'])->name('balita.update');
    // Route::delete('/balitas/{id}', [BalitaController::class, 'destroy'])->name('balita.destroy');
    Route::delete('/balitas/delete/{id}', [BalitaController::class, 'destroy'])->name('balitas.delete');
    Route::get('/balitas-export', [BalitaController::class, 'export'])->name('balitas.export');
    Route::post('/balitas-import', [BalitaController::class, 'import'])->name('balitas.import');

    Route::resource('puskesmas', PuskesmasController::class);
    Route::resource('posyandus', PosyanduController::class);

    // Route untuk menampilkan daftar Stunting
    Route::get('/stuntings', [StuntingController::class, 'index'])->name('stuntings.index');
    // Route untuk menampilkan form penambahan Stunting baru
    Route::get('/stuntings/create', [StuntingController::class, 'create'])->name('stuntings.create');
    // Route untuk menyimpan data Stunting baru
    Route::post('/stuntings', [StuntingController::class, 'store'])->name('stuntings.store');
    // Route untuk menampilkan form edit Stunting
    Route::get('/stuntings/{id}/edit', [StuntingController::class, 'edit'])->name('stuntings.edit');
    // Route detail data Stunting
    Route::get('/stuntings/{id}/detail', [StuntingController::class, 'detailData'])->name('stuntings.detailData');
    // Route untuk memperbarui data Stunting
    Route::put('/stuntings/{id}', [StuntingController::class, 'update'])->name('stuntings.update');
    // Route untuk menghapus data Stunting
    Route::delete('/stuntings/{id}', [StuntingController::class, 'destroy'])->name('stuntings.destroy');

    //Route stuntings/data-eppgbm
    Route::get('/stuntings/data-eppgbm', [StuntingController::class, 'indexEppgbm'])->name('stuntings.dataEppgbm');
    //Route stuntings/pengukuran
    Route::get('/stuntings/pengukuran/',[StuntingController::class, 'dataPengukuran'])->name('stuntings.pengukuran');
    Route::get('/stuntings/{id}/pengukuran/',[StuntingController::class, 'updatedataPengukuran'])->name('stuntings.update-pengukuran');
    //Route stuntings/export & import
    Route::get('/stunting-export',[StuntingController::class, 'export'])->name('stunting.export');
    Route::post('/stunting-import', [StuntingController::class, 'importDataStunting'])->name('stunting.import');

    //Livewire Stunting
    Route::get('/stuntings/{id}', StuntingDetail::class)->name('stuntings.detail');
    Route::get('/stuntings/{id}/edit', [StuntingController::class, 'edit'])->name('stuntings.edit');

    // Route::resource('bapakasuhs', BapakAsuhController::class);
    Route::get('/bapakasuhs', [BapakAsuhController::class, 'index'])->name('bapakasuhs.index');
    Route::get('/bapakasuhs/show', [BapakAsuhController::class, 'show'])->name('bapakasuhs.show');
    Route::get('/bapakasuhs/create', [BapakAsuhController::class, 'create'])->name('bapakasuhs.create');
    Route::post('/bapakasuhs/store', [BapakAsuhController::class, 'store'])->name('bapakasuhs.store');
    Route::get('/bapakasuhs/{id}/edit', [BapakAsuhController::class, 'edit'])->name('bapakasuhs.edit');
    Route::post('/bapakasuhs/{id}/update', [BapakAsuhController::class, 'update'])->name('bapakasuhs.update');
    Route::delete('/bapakasuhs/{id}/delete', [BapakAsuhController::class, 'destroy'])->name('bapakasuhs.destroy');

    // Route::resource('non-bapakasuhs', NonBapakAsuhController::class);
    Route::get('/non-bapakasuhs', [NonBapakAsuhController::class, 'index'])->name('nonbapakasuhs.index');
    Route::get('/non-bapakasuhs/show', [NonBapakAsuhController::class, 'show'])->name('nonbapakasuhs.show');
    Route::get('/non-bapakasuhs/create', [NonBapakAsuhController::class, 'create'])->name('nonbapakasuhs.create');
    Route::post('/non-bapakasuhs/store', [NonBapakAsuhController::class, 'store'])->name('nonbapakasuhs.store');
    Route::get('/non-bapakasuhs/{id}/edit', [NonBapakAsuhController::class, 'edit'])->name('nonbapakasuhs.edit');
    Route::post('/non-bapakasuhs/{id}/update', [NonBapakAsuhController::class, 'update'])->name('nonbapakasuhs.update');
    Route::delete('/non-bapakasuhs/{id}/delete', [NonBapakAsuhController::class, 'destroy'])->name('nonbapakasuhs.destroy');

    Route::get('/intervensi', [IntervensiController::class, 'index'])->name('intervensi.index');
    Route::get('/intervensi/create', [IntervensiController::class, 'create'])->name('intervensis.create');
    Route::post('/intervensi', [IntervensiController::class, 'store'])->name('bentuk_intervensi.store');
    Route::get('/intervensi/{id}', [IntervensiController::class, 'show'])->name('intervensi.show');
    Route::put('/intervensi/{id}', [IntervensiController::class, 'update'])->name('bentuk_intervensi.update');
    Route::get('/intervensi/{id}', [IntervensiController::class, 'edit'])->name('intervensi.edit');
    Route::get('/intervensi/{id}/destroy', [IntervensiController::class, 'destroy'])->name('intervensi.destroy');

    Route::get('intervensis/create-jenis', [IntervensiController::class, 'createJenisIntervensi'])->name('intervensis.createJenisIntervensi');
    Route::post('intervensis/store-jenis', [IntervensiController::class, 'storeJenisIntervensi'])->name('intervensis.storeJenisIntervensi');

    Route::get('intervensis/create-bentuk', [IntervensiController::class, 'createBentukIntervensi'])->name('intervensis.createBentukIntervensi');
    Route::post('intervensis/store-bentuk', [IntervensiController::class, 'storeBentukIntervensi'])->name('intervensis.storeBentukIntervensi');
    Route::delete('intervensis/{id}/destroy', [IntervensiController::class, 'destroyBentukIntervensi'])->name('intervensis.destroyBentukIntervensi');

    Route::resource('anakasuhs', AnakAsuhController::class);

    //Intervensi BPAS
    // Route::resource('/intervensi/intervensi-bpas', IntervensiBPASController::class);
    Route::get('intervensi-bpas', [IntervensiBPASController::class,'index'])->name('intervensi-bpas.index');
    Route::get('intervensi-bpas/create', [IntervensiBPASController::class,'create'])->name('intervensi-bpas.create');
    Route::delete('intervensi-bpas/{id}/destroy', [IntervensiBPASController::class,'destroy'])->name('intervensi-bpas.destroy');
    Route::get('intervensi-bpas/{id}/edit', [IntervensiBPASController::class,'edit'])->name('intervensi-bpas.edit');
    Route::put('intervensi-bpas/{id}', [IntervensiBPASController::class,'update'])->name('intervensi-bpas.update');
    Route::post('intervensi-bpas/store', [IntervensiBPASController::class,'store'])->name('intervensi-bpas.store');

    Route::get('intervensi-bpas/{id}/detail',[IntervensiBPASController::class,'detailIntervensi'])->name('intervensi-bpas.detail');
    Route::get('intervensi-bpas/{id}/add-detail',[IntervensiBPASController::class,'addDetailIntervensi'])->name('intervensi-bpas.add-detail');
    Route::post('intervensi-bpas/{id}/store-detail',[IntervensiBPASController::class,'storeDetailIntervensi'])->name('intervensi-bpas.store-detail');
    Route::get('intervensi-bpas/{id}/detail/destroy',[IntervensiBPASController::class,'destroydetailIntervensi'])->name('intervensi-bpas.detail.destroy');

    //Intervensi Non BPAS
    // Route::resource('/intervensi/intervensi-nonbpas', IntervensiNonBPASController::class);
    Route::get('intervensi-nonbpas', [IntervensiNonBPASController::class,'index'])->name('intervensi-nonbpas.index');
    Route::get('intervensi-nonbpas/create', [IntervensiNonBPASController::class,'create'])->name('intervensi-nonbpas.create');
    Route::delete('intervensi-nonbpas/{id}/destroy', [IntervensiNonBPASController::class,'destroy'])->name('intervensi-nonbpas.destroy');
    Route::get('intervensi-nonbpas/{id}/edit', [IntervensiNonBPASController::class,'edit'])->name('intervensi-nonbpas.edit');
    Route::put('intervensi-nonbpas/{id}', [IntervensiNonBPASController::class,'update'])->name('intervensi-nonbpas.update');
    Route::post('intervensi-nonbpas/store', [IntervensiNonBPASController::class,'store'])->name('intervensi-nonbpas.store');

    Route::get('intervensi-nonbpas/{id}/detail',[IntervensiNonBPASController::class,'detailIntervensi'])->name('intervensi-nonbpas.detail');
    Route::get('intervensi-nonbpas/{id}/add-detail',[IntervensiNonBPASController::class,'addDetailIntervensi'])->name('intervensi-nonbpas.add-detail');
    Route::post('intervensi-nonbpas/{id}/store-detail',[IntervensiNonBPASController::class,'storeDetailIntervensi'])->name('intervensi-nonbpas.store-detail');
    Route::get('intervensi-nonbpas/{id}/detail/destroy',[IntervensiNonBPASController::class,'destroydetailIntervensi'])->name('intervensi-nonbpas.detail.destroy');

    //Livewire Balita
    Route::get('/balitas/{id}', BalitaDetail::class)->name('balitas.detail');
    // Route::get('/balitas/{id}/edit', BalitaDetail::class)->name('balitas.edit');
    // Route::put('/balitas/{id}', BalitaDetail::class)->name('balitas.update');
    // Route::delete('/balitas/{id}', BalitaDetail::class)->name('balitas.delete');

    //livewire Keluarga
    Route::get('/keluargas', Keluarga::class)->name('keluargas.index');
    Route::get('/keluargas/{id}', Keluarga::class)->name('keluargas.detail');
    Route::get('/keluargas/create', Keluarga::class)->name('keluargas.create');
    Route::get('/keluargas/{id}/edit', Keluarga::class)->name('keluargas.edit');
    Route::put('/keluargas/{id}', Keluarga::class)->name('keluargas.update');
    Route::post('/keluargas', Keluarga::class)->name('keluargas.store');
    Route::delete('/keluargas/{id}', Keluarga::class)->name('keluargas.delete');
    Route::get('/keluargas/{id}', Keluarga::class)->name('keluargas.show');

    //Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/balita-resiko', [LaporanController::class, 'balitaresiko'])->name('laporan.balitaResiko');
    Route::get('/laporan/kasus-aktif', [LaporanController::class, 'kasusaktif'])->name('laporan.kasusAktif');
    Route::get('/laporan/kasus-sembuh', [LaporanController::class, 'kasussembuh'])->name('laporan.kasusSembuh');
    Route::get('/laporan/kasus-meninggal', [LaporanController::class, 'kasusmeninggal'])->name('laporan.kasusMeninggal');
    Route::get('/laporan/kasus-belum-intervensi', [LaporanController::class, 'kasusbelumintervensi'])->name('laporan.kasusBelumIntervensi');
    Route::get('/laporan/buku-stunting', [LaporanController::class, 'bukuStunting'])->name('laporan.bukuStunting');
    // Route::get('/laporan/buku-stunting/{NAMA_BALITA}', [LaporanController::class, 'showbukuStunting'])->name('laporan.showbukuStunting');
    Route::get('/laporan/buku-stunting/{id}', [LaporanController::class, 'showbukuStunting'])->name('laporan.showbukuStunting');
    // Chart
    Route::get('/laporan/user/chart', [UserController::class, 'showChartUser']);
    Route::get('/laporan/balita/chart', [BalitaController::class,'showChartBalita']);
    Route::get('/laporan/stunting/chart', [StuntingController::class,'showChartStunting']);
});

