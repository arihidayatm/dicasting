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
                            <div class="form-group ">
                                <label>NIK</label>
                                <input type="number"
                                    class="form-control @error('nik')
                                is-invalid
                            @enderror"
                                    nik="nik">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No. KK</label>
                                <input type="number"
                                    class="form-control @error('no_kk')
                                is-invalid
                            @enderror"
                                    no_kk="no_kk">
                                @error('no_kk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Balita</label>
                                <input type="text"
                                    class="form-control @error('nama_balita')
                                is-invalid
                            @enderror"
                                    nama_balita="nama_balita">
                                @error('nama_balita')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date"
                                    class="form-control @error('tgl_lahir')
                                is-invalid
                            @enderror"
                                    tgl_lahir="tgl_lahir">
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text"
                                    class="form-control @error('jk')
                                is-invalid
                            @enderror"
                                    jk="jk">
                                @error('jk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Umur</label>
                                <input type="number"
                                    class="form-control @error('umur')
                                is-invalid
                            @enderror"
                                    umur="umur">
                                @error('umur')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>BB Lahir</label>
                                <input type="number"
                                    class="form-control @error('bb')
                                is-invalid
                            @enderror"
                                    bb="bb">
                                @error('bb')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>TB Lahir</label>
                                <input type="number"
                                    class="form-control @error('tb')
                                is-invalid
                            @enderror"
                                    tb="tb">
                                @error('tb')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Ortu</label>
                                <input type="text"
                                    class="form-control @error('nama_ortu')
                                is-invalid
                            @enderror"
                                    nama_ortu="nama_ortu">
                                @error('nama_ortu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text"
                                    class="form-control @error('alamat')
                                is-invalid
                            @enderror"
                                    alamat="alamat">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text"
                                    class="form-control @error('kecamatan')
                                is-invalid
                            @enderror"
                                    kecamatan="kecamatan">
                                @error('kecamatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <input type="text"
                                    class="form-control @error('kelurahan')
                                is-invalid
                            @enderror"
                                    kelurahan="kelurahan">
                                @error('kelurahan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Status TB/U</label>
                                <input type="text"
                                    class="form-control @error('status_tbu')
                                is-invalid
                            @enderror"
                                    status_tbu="status_tbu">
                                @error('status_tbu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Positions with Options --}}
                            {{-- <div class="form-group">
                                <label for="position-option">Posisi</label>
                                <select class="form-control" id="position-option" name="position">
                                @foreach ($positions as $position)
                                    <option value="{{ $position->name }}">{{ $position->name }}</option>
                                @endforeach
                                </select>
                                @error('position')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}



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
