@extends('layouts.app')

@section('title', 'Laporan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    {{-- cdn chartjs --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endpush

@section('main')
    <div class="main-content">
        {{-- resources/views/pages/laporan/index.blade.php --}}
        <section class="section">
            <div class="section-header">
                <h1>Data Laporan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('laporan.index') }}">Laporan</a></div>
                    <div class="breadcrumb-item">All</div>
                </div>
            </div>

            <div class="section-body"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Laporan</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        ini adalah laporan
                                        {{-- <canvas id="myChart"></canvas> --}}
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
    {{-- cdn chartjs --}}
    
@endpush
