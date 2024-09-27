@extends('layouts.app')

@section('title', 'Form Bentuk Intervensi')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Bentuk Intervensi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('intervensi.index') }}">Forms</a></div>
                    <div class="breadcrumb-item">Add Bentuk Intervensi</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form method="POST" action="{{ route('intervensis.storeBentukIntervensi') }}">
                        @csrf
                        <div class="card-header">
                            <h4>Penambahan Bentuk Intervensi Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>bentuk Intervensi</label>
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
