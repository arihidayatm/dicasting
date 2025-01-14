@extends('layouts.app')

@section('title', 'Dashboard')

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
            {{-- statistik --}}
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        {{-- icon big --}}
                        <div class="card-icon bg-primary blink" style="background-image: linear-gradient(to left, #00feff, #007bff); cursor: pointer;" onclick="location.href='{{ route('stuntings.index') }}'" onmouseover="this.style.backgroundImage='linear-gradient(to right, #343a40, #007bff)'" onmouseout="this.style.backgroundImage='linear-gradient(to left, #00feff, #007bff)'">
                            <i class="fas fa-children"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Kasus Stunting</h4>
                            </div>
                            <div class="card-body">
                                2344{{-- {{ count(\App\Models\Stunting::all()) }} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger" style="background-image: linear-gradient(to left, #ff6474, #f42a3d); cursor: pointer;" onclick="location.href='{{ route('stuntings.index') }}'" onmouseover="this.style.backgroundImage='linear-gradient(to right, #343a40, #dc3545)'" onmouseout="this.style.backgroundImage='linear-gradient(to left, #ff6474, #f42a3d)'">
                            <i class="fas fa-children"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Kasus Aktif</h4>
                            </div>
                            <div class="card-body">
                                221{{-- {{ count(\App\Models\Stunting::all()) }} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning" style="background-image: linear-gradient(to left, #fff336, #ffc108); cursor: pointer;" onclick="location.href='{{ route('stuntings.index') }}'" onmouseover="this.style.backgroundImage='linear-gradient(to right, #343a40, #ffc107)'" onmouseout="this.style.backgroundImage='linear-gradient(to left, #fff336, #ffc108)'">
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
                        <div class="card-icon bg-success" style="background-image: linear-gradient(to left, #22fe90, #0ce03d); cursor: pointer;" onclick="location.href='{{ route('stuntings.index') }}'" onmouseover="this.style.backgroundImage='linear-gradient(to right, #343a40, #28a745)'" onmouseout="this.style.backgroundImage='linear-gradient(to left, #22fe90, #0ce03d)'">
                            <i class="fas fa-chart-simple"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Penyelesaian Kasus Stunting</h4>
                            </div>
                            <div class="card-body">
                                {{-- count total Stunting dikurangi dengan total stunting pada bulan yang ditentukan, misal pada bulan desember 2024 --}}
                                2123{{-- {{ count(\App\Models\Stunting::all()) - count(\App\Models\Stunting::whereMonth('created_at', 12)->whereYear('created_at', 2024)->get()) }} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning" style="background-image: linear-gradient(to left, #ff892e, #ffc107); cursor: pointer;" onclick="location.href='{{ route('stuntings.index') }}'" onmouseover="this.style.backgroundImage='linear-gradient(to right, #343a40, #ffc107)'" onmouseout="this.style.backgroundImage='linear-gradient(to left, #ff892e, #ffc107)'">
                            <i class="fas fa-marker"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Balita Beresiko Tinggi Stunting</h4>
                            </div>
                            <div class="card-body">
                                {{-- count total stunting dengan status $stunting->STATUS_TBU = 'Sangat Pendek' pada bulan 12 --}}
                                57{{-- {{ count(App\Models\Stunting::where('STATUS_TBU', 'Sangat Pendek')->whereMonth('created_at', 12)->get()) }} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success" style="background-image: linear-gradient(to left, #a7a328, #14f010); cursor: pointer;" onclick="location.href='{{ route('bapakasuhs.index') }}'" onmouseover="this.style.backgroundImage='linear-gradient(to right, #343a40, #28a745)'" onmouseout="this.style.backgroundImage='linear-gradient(to left, #a7a328, #14f010)'">
                            <i class="fas fa-people-group"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Bapak Ibu Asuh</h4>
                            </div>
                            <div class="card-body">
                                {{-- {{ count(\App\Models\BapakAsuh::all()) }} --}}
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
            {{-- Master Data --}}
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        {{-- icon big --}}
                        <div class="card-icon bg-primary blink" style="background-color: #007bff !important; cursor: pointer;" onclick="location.href='{{ route('keluargas.index') }}'" onmouseover="this.style.opacity='0.6'" onmouseout="this.style.opacity='1'">
                            <i class="fas fa-people-roof"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Keluarga</h4>
                            </div>
                            <div class="card-body">
                                {{ count(\App\Models\Keluarga::all()) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger blink" style="background-color: #f42a3d !important; cursor: pointer;" onclick="location.href='{{ route('balita.index') }}'" onmouseover="this.style.opacity='0.6'" onmouseout="this.style.opacity='1'">
                            <i class="fas fa-baby"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Balita</h4>
                            </div>
                            <div class="card-body">
                                {{ count(\App\Models\Balita::all()) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning blink" style="background-color: #ffc107 !important; cursor: pointer;" onclick="location.href='{{ route('puskesmas.index') }}'" onmouseover="this.style.opacity='0.6'" onmouseout="this.style.opacity='1'">
                            <i class="fas fa-house-chimney-medical"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Puskesmas</h4>
                            </div>
                            <div class="card-body">
                                {{-- count total Puskesmas --}}
                                {{ count(\App\Models\Puskesmas::all()) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success blink" style="background-color: #0ce03d !important; cursor: pointer;" onclick="location.href='{{ route('posyandus.index') }}'" onmouseover="this.style.opacity='0.6'" onmouseout="this.style.opacity='1'">
                            <i class="fas fa-square-plus"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Posyandu</h4>
                            </div>
                            <div class="card-body">
                                {{-- count total posyandu --}}
                                {{ count(\App\Models\Posyandu::all()) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning blink" style="background-color: #ffc107 !important; cursor: pointer;" onclick="location.href='#'" onmouseover="this.style.opacity='0.6'" onmouseout="this.style.opacity='1'">
                            <i class="fas fa-school"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Sekolah</h4>
                            </div>
                            <div class="card-body">
                                {{-- count total Sekolah --}}
                                0
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success blink" style="background-color: #ff707d !important; cursor: pointer;" onclick="location.href='#'" onmouseover="this.style.opacity='0.6'" onmouseout="this.style.opacity='1'">
                            <i class="fas fa-person-pregnant"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Ibu Hamil</h4>
                            </div>
                            <div class="card-body">
                                {{-- count total Ibu Hamil --}}
                                44{{-- {{ count(\App\Models\IbuHamil::all()) }} --}}
                            </div>
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
