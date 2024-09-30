@extends('layouts.app')

@section('title', 'Balita Resiko')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    {{-- highcharts --}}
    <link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

@endpush

@section('main')
    <div class="main-content">
        {{-- resources/views/pages/laporan/balitaresiko.blade.php --}}
        <section class="section">
            <div class="section-header">
                <h1>Data Balita Resiko</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('balita.index') }}">Balita</a></div>
                    <div class="breadcrumb-item">Data Resiko</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Balita Resiko</h4>
                            </div>
                            <div class="card-body">
                                ini adalah data balita resiko tinggi stunting
                                {{-- <canvas id="myChart"></canvas> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{-- script Highchartjs --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
