@extends('layouts.app')

@section('title', 'Form Bapak Asuh')

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
                <h1>Form Bapak Asuh</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('bapakasuhs.index') }}">Forms</a></div>
                    <div class="breadcrumb-item">Bapak Asuh</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('bapakasuhs.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Penambahan Data Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text"
                                            class="form-control @error('NIK_ORANGTUAASUH') is-invalid @enderror"
                                            name="NIK_ORANGTUAASUH">
                                        @error('NIK_ORANGTUAASUH')
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
                                            name="NAMA_ORANGTUAASUH">
                                        @error('NAMA_ORANGTUAASUH')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text"
                                    class="form-control @error('ALAMAT') is-invalid @enderror"
                                    name="ALAMAT">
                                @error('ALAMAT')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kabupaten_id">Kabupaten/Kota</label>
                                <select class="form-control select2" name="KABUPATEN_ID" id="kabupaten_id">
                                    <option disabled value>Pilih Kabupaten/Kota</option>
                                    @foreach ($kabupatens as $kabupaten)
                                        <option value="{{ $kabupaten->id }}">{{ $kabupaten->NAMA_KABKOTA }}</option>
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
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->NAMA_KECAMATAN }}</option>
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
                                        <option value="{{ $kelurahan->id }}">{{ $kelurahan->NAMA_KELURAHANDESA }}</option>
                                    @endforeach
                                </select>
                                @error('KELURAHANDESA_ID')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>No. HP</label>
                                <input type="number"
                                    class="form-control @error('NOHP') is-invalid @enderror"
                                    name="NOHP">
                                @error('NOHP')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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
