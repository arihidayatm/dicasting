@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fa-solid fa-children text-white"></i>
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
                            <i class="fa-solid fa-children text-white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Kasus Aktif</h4>
                            </div>
                            <div class="card-body">
                                1,201{{-- {{ count(\App\Models\Permission::all()) }} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Belum Dapatkan Intervensi</h4>
                            </div>
                            <div class="card-body">
                                1,201
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-marker"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Penyelesaian Kasus Stunting</h4>
                            </div>
                            <div class="card-body">
                                100{{-- {{ count(\App\Models\Position::all())}} --}}
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
                                50{{-- {{ count(\App\Models\Position::all())}} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-marker"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Balita Tidak Beresiko Tinggi Stunting</h4>
                            </div>
                            <div class="card-body">
                                10{{-- {{ count(\App\Models\Position::all())}} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- User registration chart --}}
            {{-- <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>User Registration</h4>
                        </div>
                        <div class="card-body" style="width: 75%;">
                            <x-chartjs-component :chart="$chart" />
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- Grafik Perkembangan Stunting --}}
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics Kasus Stunting</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart3"
                                height="170"></canvas>

                            <div class="mb-4 mt-4">
                                <div class="text-small font-weight-bold text-muted float-right">
                                    {{-- Total Stunting filter by KECAMATAN_ID --}}
                                    {{ count(\App\Models\Stunting::all()) }}</div>
                                <div class="font-weight-bold mb-1">Silungkang</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="25%"
                                        aria-valuenow="55"
                                        aria-valuemin="0"
                                        aria-valuemax="1000"></div>
                                </div>
                            </div>
                            <div class="mb-4 mt-4">
                                <div class="text-small font-weight-bold text-muted float-right">{{ count(\App\Models\Stunting::all()) }}</div>
                                <div class="font-weight-bold mb-1">Lembah Segar</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="25%"
                                        aria-valuenow="55"
                                        aria-valuemin="0"
                                        aria-valuemax="1000"></div>
                                </div>
                            </div>
                            <div class="mb-4 mt-4">
                                <div class="text-small font-weight-bold text-muted float-right">{{ count(\App\Models\Stunting::all()) }}</div>
                                <div class="font-weight-bold mb-1">Barangin</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="25%"
                                        aria-valuenow="55"
                                        aria-valuemin="0"
                                        aria-valuemax="1000"></div>
                                </div>
                            </div>
                            <div class="mb-4 mt-4">
                                <div class="text-small font-weight-bold text-muted float-right">{{ count(\App\Models\Stunting::all()) }}</div>
                                <div class="font-weight-bold mb-1">Talawi</div>
                                <div class="progress"
                                    data-height="3">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        data-width="25%"
                                        aria-valuenow="55"
                                        aria-valuemin="0"
                                        aria-valuemax="1000"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
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
                        {{-- Grafik Perkembangan Stunting --}}
                        <div class="card-body">
                            <canvas id="myChart" height="182"></canvas>
                            <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus'],
                                        datasets: [{
                                            label: 'Perkembangan Stunting',
                                            data: [10, 9, 8, 7, 6, 5, 4, 3],
                                            borderColor: 'rgba(75, 192, 192, 0.2)',
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                                            pointBorderColor: '#fff',
                                            pointHoverBackgroundColor: '#fff',
                                            pointHoverBorderColor: 'rgba(220,220,220,1)'
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>

                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bapak Asuh</h4>
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
                                <li class="media">
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('img/avatar/avatar-4.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="float-right">21m</div>
                                        <div class="media-title">Alfa Zulkarnain</div>
                                        <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla.
                                            Nulla vel metus scelerisque ante sollicitudin.</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="pt-1 pb-1 text-center">
                                <a href="#"
                                    class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bapak Ibu Asuh</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                            @foreach($bapakasuhs as $bapakasuh)
                                <li class="media">
                                <img class="rounded-circle mr-3" width="50" src="{{ asset('img/avatar/'.$bapakasuh->avatar) }}" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right">{{ $bapakasuh->updated_at->diffForHumans() }}</div>
                                    <div class="media-title">{{ $bapakasuh->NAMA_ORANGTUAASUH }}</div>
                                    {{-- <span class="text-small text-muted">{{ $bapakasuh->description }}</span>
                                </div>
                                </li>
                            @endforeach
                            </ul>
                            <div class="pt-1 pb-1 text-center">
                            <a href="{{ route('bapakasuhs.index') }}" class="btn btn-primary btn-lg btn-round">View All</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Doughnut Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart3"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pie Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
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

    <!-- JS Libraies -->
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-chartjs.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
