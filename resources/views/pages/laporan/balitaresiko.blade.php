@extends('layouts.app')

@section('title', 'Laporan Balita Resiko')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">

@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laporan Balita Resiko</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('laporan.index') }}">Laporan</a></div>
                    <div class="breadcrumb-item">Balita Resiko</div>
                </div>
            </div>

            <div class="section-body"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Balita Resiko</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        ini adalah Laporan Balita Resiko

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

@endpush
