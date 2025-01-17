@extends('layouts.app')

@section('title', 'Dashboard User')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">

@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard - {{ auth()->user()->name }}</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        {{-- icon big --}}
                        <div class="card-icon bg-primary">
                            <i class="fas fa-children"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Kasus Stunting</h4>
                            </div>
                            <div class="card-body">
                                {{ count(\App\Models\Stunting::all()) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-children"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Kasus Aktif</h4>
                            </div>
                            <div class="card-body">
                                {{ count(\App\Models\Stunting::all()) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Belum Dapatkan Intervensi</h4>
                            </div>
                            <div class="card-body">
                                {{-- count total Stunting belum diberi intervensi --}}
                                {{ App\Models\Stunting::totalBelumDiberiIntervensi() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-chart-simple"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Penyelesaian Kasus Stunting</h4>
                            </div>
                            <div class="card-body">
                                0{{-- {{ count(\App\Models\Position::all())}} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-marker"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Balita Beresiko Tinggi Stunting</h4>
                            </div>
                            <div class="card-body">
                                {{-- count total stunting dengan status TB/U = Sangat Pendek --}}
                                0{{-- {{ count(\App\Models\Stunting::where('STATUS_TBU','Sangat Pendek')->get()) }} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-people-group"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Bapak Ibu Asuh</h4>
                            </div>
                            <div class="card-body">
                                {{ count(\App\Models\BapakAsuh::all()) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Grafik Perkembangan Stunting --}}
            <div class="row">
                <div class="col-lg-8 col-md-8 col-8 col-sm-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistik Kasus Stunting</h4>
                        </div>
                        <div class="card-body center" style="width: 100% !important;">
                            {!! App\Http\Controllers\DashboardController::showChartLineStunting()->render() !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-4 col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Stunting Per Jenis Kelamin</h4>
                        </div>
                        <div class="card-body center" style="width: 100% !important;">
                            {!! App\Http\Controllers\DashboardController::showChartPieSexRatio()->render() !!}
                        </div>
                    </div>
                </div>
            </div>
            {{-- Total Stunting Per Kecamatan--}}
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Stunting Berdasarkan Jenis Kelamin di Kecamatan</h4>
                        </div>
                        <div class="card-body center" style="width: 100% !important;">
                            {!! App\Http\Controllers\DashboardController::showChartStuntingKecamatan()->render() !!}
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics Kasus Stunting</h4>
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <a href="#"
                                        class="btn btn-primary">Month</a>
                                    <a href="#"
                                        class="btn">Year</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="140"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bapak Ibu Asuh</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('img/avatar/avatar-1.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="text-primary float-right">Now</div>
                                        <div class="media-title">Farhan A Mujib</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.
                                            Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('img/avatar/avatar-2.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right">12m</div>
                                        <div class="media-title">Ujang Maman</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.
                                            Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>
                                <li class="media">
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('img/avatar/avatar-3.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right">17m</div>
                                        <div class="media-title">Rizal Fakhri</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.
                                            Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>

                            </ul>
                            <div class="pt-1 pb-1 text-center">
                                <a href="{{ Route('bapakasuhs.index') }}"
                                    class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="row">
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card flex-fill w-100">
                        <div class="card-body">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card flex-fill w-100">
                        <div class="card-body">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-chartjs.js') }}"></script>

    {{-- cdn chartjs --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    {{-- {!! $chartLineStunting->render() !!}
    {!! $chartSexRatio->render() !!}
    {!! $chartPieSexRatio->render() !!}
    {!! $chartStuntingKecamatan->render() !!} --}}
@endpush
