@extends('layouts.app')

@section('title', 'Form Jenis Intervensi')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Jenis Intervensi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('intervensi.index') }}">Forms</a></div>
                    <div class="breadcrumb-item">Add Jenis Intervensi</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form method="POST" action="{{ route('intervensis.storeJenisIntervensi') }}">
                        @csrf
                        <div class="card-header">
                            <h4>Penambahan Jenis Intervensi Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Intervensi</label>
                                        <input type="text"
                                            class="form-control @error('jenis_intervensi') is-invalid @enderror"
                                            name="jenis_intervensi">
                                        @error('jenis_intervensi')
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
                            <a href="{{ route('intervensi.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
