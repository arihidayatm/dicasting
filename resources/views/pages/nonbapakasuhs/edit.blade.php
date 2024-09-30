@extends('layouts.app')

@section('title', 'Edit Non Bapak Ibu Asuh')

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
                <h1>Edit Non Bapak Ibu Asuh</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('nonbapakasuhs.index') }}">Non Bapak Ibu Asuh</a></div>
                    <div class="breadcrumb-item">Edit Data</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Data Non Bapak Ibu Asuh</h2>
                <div class="card">
                    <form action="{{ route('nonbapakasuhs.update', $bapakasuh->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Form Edit Bapak Ibu Asuh</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <input type="text"
                                            class="form-control @error('KODE_NONORANGTUAASUH') is-invalid @enderror"
                                            name="KODE_NONORANGTUAASUH" value="{{ $nonbapakasuh->KODE_NONORANGTUAASUH }}">
                                        @error('KODE_NONORANGTUAASUH')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Non Bapak Asuh</label>
                                        <input type="text"
                                            class="form-control @error('NAMA_NONORANGTUAASUH') is-invalid @enderror"
                                            name="NAMA_NONORANGTUAASUH" value="{{ $nonbapakasuh->NAMA_NONORANGTUAASUH }}">
                                        @error('NAMA_NONORANGTUAASUH')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text"
                                            class="form-control @error('ALAMAT') is-invalid @enderror"
                                            name="ALAMAT" value="{{ $nonbapakasuh->ALAMAT }}">
                                        @error('ALAMAT')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>No. HP</label>
                                        <input type="number"
                                            class="form-control"
                                            name="NOHP" value="{{ $nonbapakasuh->NOHP }}">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                            <a href="{{ route('nonbapakasuhs.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
