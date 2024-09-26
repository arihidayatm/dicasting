@extends('layouts.app')

@section('title', 'Edit Bapak Asuh')

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
                <h1>Edit Bapak Ibu Asuh</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('bapakasuhs.index') }}">Bapak Ibu Asuh</a></div>
                    <div class="breadcrumb-item">Edit Data</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Data Bapak Ibu Asuh</h2>
                <div class="card">
                    <form action="{{ route('bapakasuhs.update', $bapakasuh->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Form Edit Bapak Ibu Asuh</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text"
                                            class="form-control @error('NIK_ORANGTUAASUH') is-invalid @enderror"
                                            name="NIK_ORANGTUAASUH" value="{{ $bapakasuh->NIK_ORANGTUAASUH }}">
                                        @error('NIK_ORANGTUAASUH')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Bapak Asuh</label>
                                        <input type="text"
                                            class="form-control @error('NAMA_ORANGTUAASUH') is-invalid @enderror"
                                            name="NAMA_ORANGTUAASUH" value="{{ $bapakasuh->NAMA_ORANGTUAASUH }}">
                                        @error('NAMA_ORANGTUAASUH')
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
                                            name="ALAMAT" value="{{ $bapakasuh->ALAMAT }}">
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
                                            name="NOHP" value="{{ $bapakasuh->NOHP }}">
                                    </div>

                                </div>
                            </div>
                            
                            {{-- 
                            <div class="form-group">
                                <label for="kabupaten_id">Kabupaten/Kota</label>
                                <select class="form-control select2" name="KABUPATEN_ID" id="kabupaten_id">
                                    <option disabled value>Pilih Kabupaten/Kota</option>
                                    @foreach ($kabupatens as $kabupaten)
                                        <option value="{{ $kabupaten->id }}" {{ $bapakasuh->KABUPATEN_ID == $kabupaten->id ? 'selected' : '' }}>
                                            {{ $kabupaten->NAMA_KABKOTA }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('KABUPATEN_ID')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kecamatan_id">Kecamatan</label>
                                <select class="form-control select2" name="KECAMATAN_ID" id="kecamatan_id">
                                    <option disabled value>Pilih Kecamatan</option>
                                    @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}" {{ $bapakasuh->KECAMATAN_ID == $kecamatan->id ? 'selected' : '' }}>
                                            {{ $kecamatan->NAMA_KECAMATAN }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('KECAMATAN_ID')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kelurahan_id">Kelurahan/Desa</label>
                                <select class="form-control select2" name="KELURAHANDESA_ID" id="kelurahan_id">
                                    <option disabled value>Pilih Kelurahan/Desa</option>
                                    @foreach ($kelurahans as $kelurahan)
                                        <option value="{{ $kelurahan->id }}" {{ $bapakasuh->KELURAHANDESA_ID == $kelurahan->id ? 'selected' : '' }}>
                                            {{ $kelurahan->NAMA_KELURAHANDESA }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('KELURAHANDESA_ID')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                            <a href="{{ route('bapakasuhs.index') }}" class="btn btn-secondary">Cancel</a>
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
