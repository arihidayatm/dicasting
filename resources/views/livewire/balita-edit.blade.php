<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Balita</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('balita.index') }}">Edit Data</a></div>
                <div class="breadcrumb-item">Balita</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>

            <div class="clearfix mb-3"></div>
            {{-- Tab Content --}}
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Detail Balita</h4>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-12">
                                        <div class="card mt-4">
                                            {{-- <form action="{{ route('balitas.update', $balita->NIK) }}" method="POST"> --}}
                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="NIK">NIK</label>
                                                        <input type="text" class="form-control" id="NIK"
                                                            placeholder="Enter NIK" wire:model="NIK">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="NAMA_BALITA">Nama</label>
                                                        <input type="text" class="form-control" id="NAMA_BALITA"
                                                            placeholder="Enter Nama Balita" wire:model="NAMA_BALITA">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="TGL_LAHIR">Tgl Lahir</label>
                                                        <input type="date" class="form-control" id="TGL_LAHIR"
                                                            placeholder="Enter Tgl Lahir" wire:model="TGL_LAHIR">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="JENIS_KELAMIN">Jenis Kelamin</label>
                                                        <select name="JENIS_KELAMIN" id="JENIS_KELAMIN" class="form-control" wire:model="JENIS_KELAMIN">
                                                            <option value="Laki-laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="NAMA_ORANGTUA">Orang Tua</label>
                                                        <input type="text" class="form-control" id="NAMA_ORANGTUA"
                                                            placeholder="Enter Orang Tua" wire:model="NAMA_ORANGTUA">
                                                    </div>

                                                </div>
                                            {{-- </form> --}}
                                        </div>

                                    </div>
                                    <div class="col-4">

                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    {{-- Simpan Data Balita button --}}
                                    <button class="btn btn-primary" wire:click="update">Simpan</button>
                                    <a href="{{ route('balita.index') }}" class="btn btn-secondary">Back</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
