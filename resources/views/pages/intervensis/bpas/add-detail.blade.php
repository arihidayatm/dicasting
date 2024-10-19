@extends('layouts.app')

@section('title', 'Form Detail Intervensi')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Detail Intervensi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('intervensi-bpas.index') }}">Forms</a></div>
                    <div class="breadcrumb-item">Add Detail</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form method="POST" action="{{ route('intervensi-bpas.store-detail', $intervensiBPAS->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Detail Intervensi</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Anak Asuh</label>
                                        <input type="text"
                                            class="form-control @error('NAMA_BALITA') is-invalid @enderror"
                                            name="NAMA_BALITA"
                                            value="{{ old('NAMA_BALITA', $intervensiBPAS->stunting->NAMA_BALITA) }}" readonly>
                                        @error('NAMA_BALITA')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Bapak Asuh</label>
                                        <input type="text"
                                            class="form-control @error('NAMA_ORANGTUAASUH') is-invalid @enderror"
                                            name="NAMA_ORANGTUAASUH"
                                            value="{{ old('NAMA_ORANGTUAASUH', $intervensiBPAS->bapakasuh->NAMA_ORANGTUAASUH) }}" readonly>
                                        @error('NAMA_ORANGTUAASUH')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bentuk Intervensi</label>
                                        <input type="text"
                                            class="form-control @error('BENTUK_INTERVENSI') is-invalid @enderror"
                                            name="BENTUK_INTERVENSI"
                                            value="{{ old('BENTUK_INTERVENSI', $intervensiBPAS->bentukintervensi->BENTUK_INTERVENSI) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Intervensi</label>
                                        <input type="date"
                                            class="form-control"
                                            name="TGL_INTERVENSI"
                                            value="{{ old('TGL_INTERVENSI') }}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Foto Anak Asuh</label>
                                        <input type="file"
                                            class="form-control" name="FOTO_ANAK">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dokumentasi</label>
                                        <input type="file"
                                            class="form-control" name="DOKUMENTASI">
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Anggaran (*Optional)</label>
                                        <select name="ANGGARAN" class="form-control">
                                            <option value="">-- Pilih Anggaran --</option>
                                            <option value="APBN">APBN</option>
                                            <option value="APBD Provinsi">APBD Provinsi</option>
                                            <option value="APBD Kota">APBD Kota</option>
                                            <option value="CSR">CSR</option>
                                            <option value="DANA DESA">DANA DESA</option>
                                            <option value="BAZNAS">BAZNAS</option>
                                            <option value="SWADAYA">SWADAYA</option>
                                            <option value="LAINNYA">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nominal (*Optional)</label>
                                        <input type="text"
                                            class="form-control"
                                            name="NOMINAL_ANGGARAN"
                                            value="{{ old('NOMINAL_ANGGARAN') }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text"
                                            class="form-control"
                                            name="KETERANGAN"
                                            value="{{ old('KETERANGAN') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('intervensi-bpas.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
