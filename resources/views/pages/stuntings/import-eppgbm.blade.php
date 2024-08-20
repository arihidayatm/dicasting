@extends('layouts.app')

@section('title', 'Intervensi')

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
                    <div class="breadcrumb-item"><a href="#">Data E-PPGBM</a></div>
                    <div class="breadcrumb-item">Import Data</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
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
                                    <form method="GET" action="{{ route('stuntings.index') }}">
                                        <div class="form-group">
                                            <select class="form-control" id="jenis_intervensi" name="jenis_intervensi" onchange="this.form.submit()">
                                                <option value="">-- Pilih Jenis Intervensi --</option>
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
                                    <a href="{{ route('stuntings.create') }}" class="btn btn-primary float-left">Create</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush