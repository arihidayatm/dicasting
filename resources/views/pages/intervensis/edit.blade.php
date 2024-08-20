@extends('layouts.app')

@section('title', 'Edit Intervensi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('bapakasuhs.index') }}">Forms</a></div>
                    <div class="breadcrumb-item">Edit Intervensi</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">intervensi</h2>

                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('intervensi.update', $intervensi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Input Text</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Bentuk Intervensi</label>
                                    <input type="text"
                                        class="form-control @error('bentuk_intervensi')
                                    is-invalid
                                @enderror"
                                        name="bentuk_intervensi" value="{{ $intervensi->bentuk_intervensi }}">
                                    @error('bentuk_intervensi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text"
                                        class="form-control @error('keterangan')
                                    is-invalid
                                @enderror"
                                        name="keterangan" value="{{ $intervensi->keterangan }}">
                                    @error('keterangan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                {{-- Cancel button --}}
                                <a href="{{ route('intervensi.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
