@extends('layouts.app')

@section('title', 'Data ePPGBM')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data E-PPGBM</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('stuntings.dataEppgbm') }}">Data</a></div>
                    <div class="breadcrumb-item">E-PPGBM</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    {{-- card with icon and import button --}}

                                    <div class="col-3 col-md-3 col-lg-3 center">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-primary">
                                                <i class="fas fa-children"></i>
                                            </div>
                                            <div class="card-header">
                                                <h4>Import Data Balita</h4>
                                            </div>
                                            <div class="card-body mt-2 mb-4">
                                                <form action="{{ route('balitas.import') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file" aria-label="Upload">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-success btn-sm" type="submit" id="file">Import</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="col-3 col-md-3 col-lg-3 center">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-warning">
                                                <i class="fas fa-children"></i>
                                            </div>
                                            <div class="card-header">
                                                <h4>Import Data Stunting</h4>
                                            </div>
                                            <div class="card-body mt-2 mb-4">
                                                <form action="{{ route('balitas.import') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file" aria-label="Upload">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-success btn-sm" type="submit" id="file">Import</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="col-3 col-md-3 col-lg-3 center">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-success">
                                                <i class="fas fa-children"></i>
                                            </div>
                                            <div class="card-header">
                                                <h4>Import Data Pengukuran</h4>
                                            </div>
                                            <div class="card-body mt-2 mb-4">
                                                <form action="{{ route('balitas.import') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file" aria-label="Upload">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-success btn-sm" type="submit" id="file">Import</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="col-3 col-md-3 col-lg-3 center">
                                        <div class="card card-statistic-1">
                                            <div class="card-icon bg-danger">
                                                <i class="fas fa-children"></i>
                                            </div>
                                            <div class="card-header">
                                                <h4>Import Data Tindakan</h4>
                                            </div>
                                            <div class="card-body mt-2 mb-4">
                                                <form action="{{ route('balitas.import') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="file" aria-label="Upload">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-success btn-sm" type="submit" id="file">Import</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tahun Periode</h4>
                                <div class="row">
                                    <div class="float-left col-3"></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="float-left col-6">
                                    <form method="GET" action="{{ route('stuntings.eppgbm') }}">
                                        <div class="form-group">
                                            <select class="form-control" id="jenis_intervensi" name="jenis_intervensi" onchange="this.form.submit()">
                                                <option value="">-- Pilih Tahun --</option>
                                                @foreach($jenisIntervensis as $jenisIntervensi)
                                                    <option value="{{ $jenisIntervensi->id }}" {{ request('jenis_intervensi') == $jenisIntervensi->id ? 'selected' : '' }}>
                                                        {{ $jenisIntervensi->JENIS_INTERVENSI }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="float-right col-6">
                                    <a href="{{ route('intervensis.createJenisIntervensi') }}" class="btn btn-primary float-left">Create</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tahun Periode</h4>
                                <div class="row">
                                    <div class="float-left col-3"></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="float-left col-6">
                                    <form method="GET" action="{{ route('stuntings.eppgbm') }}">
                                        <div class="form-group">
                                            <select class="form-control" id="tahun_lab" name="tahun_lab" onchange="this.form.submit()">
                                                <option value="">-- Pilih Tahun --</option>
                                                @foreach($lapTahun as $tahun_lap)
                                                    <option value="{{ $lapTahun->id }}" {{ request('tahun_lap') == $tahun_lap->id ? 'selected' : '' }}>
                                                        {{ $tahun_lap->TAHUN }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="float-right col-6">
                                    <a href="{{ route('stuntings.eppgbm') }}" class="btn btn-primary float-left">Create</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sumber Data</h4>
                        </div>
                        <div class="card-body">
                            <p>e-PPGBM</p>
                            <ul>
                                <li>Import Data Balita Tahun 2024</li>
                                <li>Import Data Stunting Tahun 2024</li>
                                <li>Import Data Puskesmas Tahun 2024</li>
                                <li>Import Data Posyandu Tahun 2024</li>
                                <li>Peraturan Menteri Kesehatan (Permenkes) No. 2 Tahun 2020 tentang Standar Antropometri Anak</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
