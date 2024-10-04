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
                    <form method="POST" action="{{ route('intervensis.storeBentukIntervensi') }}">
                        @csrf
                        <div class="card-header">
                            <h4>Penambahan Detail Intervensi Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Anak Asuh</label>
                                        <input type="text"
                                            class="form-control @error('bentuk_intervensi') is-invalid @enderror"
                                            name="bentuk_intervensi">
                                        @error('bentuk_intervensi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Intervensi</label>
                                        <input type="date"
                                            class="form-control @error('keterangan') is-invalid @enderror"
                                            name="keterangan">
                                        @error('keterangan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Foto Anak Asuh</label>
                                        <input type="file"
                                            class="form-control @error('FOTO_ANAK') is-invalid @enderror"
                                            name="FOTO_ANAK">
                                        @error('FOTO_ANAK')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dokumentasi</label>
                                        <input type="file"
                                            class="form-control @error('DOKUMENTASI') is-invalid @enderror"
                                            name="DOKUMENTASI">
                                        @error('DOKUMENTASI')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Anggaran</label>
                                        <input type="text"
                                            class="form-control @error('ANGGARAN') is-invalid @enderror"
                                            name="ANGGARAN">
                                        @error('ANGGARAN')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text"
                                            class="form-control @error('keterangan') is-invalid @enderror"
                                            name="keterangan">
                                        @error('keterangan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                            <a href="{{ route('intervensi-bpas.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
