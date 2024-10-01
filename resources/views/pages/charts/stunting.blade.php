@extends('layouts.app')

@section('title', 'Chart Stunting')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    {{-- cdn chartjs --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Chart Stunting</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Statistic Stunting</h4>
                            </div>
                            <div class="card-body center" style="width: 100% !important;">
                                {!! $chartLineStunting->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Stunting Berdasarkan Jenis Kelamin</h4>
                            </div>
                            <div class="card-body center" style="width: 100% !important;">
                                {!! $chartSexRatio->render() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Stunting Berdasarkan Jenis Kelamin</h4>
                            </div>
                            <div class="card-body center" style="width: 100% !important;">
                                {!! $chartPieSexRatio->render() !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Stunting Berdasarkan Jenis Kelamin Per Kecamatan</h4>
                            </div>
                            <div class="card-body center" style="width: 100% !important;">
                                {!! $chartStuntingKecamatan->render() !!}
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {!! $chartLineStunting->render() !!}
    {!! $chartSexRatio->render() !!}
    {!! $chartPieSexRatio->render() !!}
    {!! $chartStuntingKecamatan->render() !!}
@endpush