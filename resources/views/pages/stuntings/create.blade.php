@extends('layouts.app')

@section('title', 'Form Stuntings')

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
                    <div class="breadcrumb-item"><a href="{{ route('stuntings.index') }}">Forms</a></div>
                    <div class="breadcrumb-item">Stuntings</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('stuntings.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Penambahan Data Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="NIK">NIK</label>
                                <input type="text" class="form-control" id="NIK" name="NIK" required>
                            </div>
                            <div class="form-group">
                                <label for="NO_KK">No KK</label>
                                <input type="text" class="form-control" id="NO_KK" name="NO_KK" required>
                            </div>
                            <div class="form-group">
                                <label for="NAMA_BALITA">Nama Balita</label>
                                <input type="text" class="form-control" id="NAMA_BALITA" name="NAMA_BALITA" required>
                            </div>
                            <div class="form-group">
                                <label for="TGL_LAHIR">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="TGL_LAHIR" name="TGL_LAHIR" required>
                            </div>
                            <div class="form-group">
                                <label for="JENIS_KELAMIN">Jenis Kelamin</label>
                                <select class="form-control" id="JENIS_KELAMIN" name="JENIS_KELAMIN" required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="BERAT_BADAN">Berat Badan</label>
                                <input type="number" class="form-control" id="BERAT_BADAN" name="BERAT_BADAN" required>
                            </div>
                            <div class="form-group">
                                <label for="TINGGI_BADAN">Tinggi Badan</label>
                                <input type="number" class="form-control" id="TINGGI_BADAN" name="TINGGI_BADAN" required>
                            </div>
                            <div class="form-group">
                                <label for="NAMA_ORANGTUA">Nama Orang Tua</label>
                                <input type="text" class="form-control" id="NAMA_ORANGTUA" name="NAMA_ORANGTUA" required>
                            </div>
                            <div class="form-group">
                                <label for="ALAMAT">Alamat</label>
                                <input type="text" class="form-control" id="ALAMAT" name="ALAMAT" required>
                            </div>
                            <div class="form-group">
                                <label for="KECAMATAN_ID">Kecamatan</label>
                                <select class="form-control" id="KECAMATAN_ID" name="KECAMATAN_ID" required>
                                    @foreach($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->NAMA_KECAMATAN }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KELURAHANDESA_ID">Kelurahan/Desa</label>
                                <select class="form-control" id="KELURAHANDESA_ID" name="KELURAHANDESA_ID" required>
                                    @foreach($kelurahandesas as $kelurahandesa)
                                        <option value="{{ $kelurahandesa->id }}">{{ $kelurahandesa->NAMA_KELURAHANDESA }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sumber_data">Sumber Data</label>
                                <input type="text" class="form-control" id="sumber_data" name="sumber_data" required>
                            </div>
                            <div class="form-group">
                                <label for="tgl_pengukuran">Tanggal Pengukuran</label>
                                <input type="date" class="form-control" id="tgl_pengukuran" name="tgl_pengukuran" required>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                            {{-- Cancel button --}}
                            <a href="{{ route('stuntings.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
