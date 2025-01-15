@extends('layouts.app')

@section('title', 'Laporan Balita Resiko Tinggi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">

@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laporan Balita Resiko Tinggi Stunting</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('laporan.index') }}">Laporan</a></div>
                    <div class="breadcrumb-item">Balita Resiko Tinggi Stunting</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Balita Resiko Tinggi Stunting</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <a class="btn btn-outline-secondary" href="{{route('stunting.export')}}" role="button">Export</a>
                                        <button type="button" class="btn btn-outline-info btn-sm">Copy</button>
                                    </div>
                                    <div class="col-3">
                                        <form method="GET" action="{{ route('laporan.balitaResiko') }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search by Status TB/U" name="status_tbu">
                                                <div class="input-group-append">
                                                    <button class="btn btn-success"><i class="fa-solid fa-square-check"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-3">
                                        <form method="GET" action="{{ route('laporan.balitaResiko') }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search by Name" name="nama_balita">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-3">
                                        <form method="GET" action="{{ route('laporan.balitaResiko') }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search by Nama Kecamatan" name="nama_kecamatan">
                                                <div class="input-group-append">
                                                    <button class="btn btn-warning"><i class="fa-solid fa-square-plus"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive table-fixed">

                                    <table class="table-striped table">
                                        <tr>
                                            <th>NIK</th>
                                            {{-- <th>No.KK</th> --}}
                                            <th>Nama Balita</th>
                                            <th>Tgl. Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur</th>
                                            {{-- <th>BB Lahir</th>
                                            <th>TB Lahir</th> --}}
                                            <th>Nama Orangtua</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            <th>Status TB/U</th>
                                        </tr>
                                        @foreach ($laporanBalitaresiko as $stunting)
                                            <tr>
                                                <td><a href="{{ route('stuntings.detailData', $stunting->id) }}">{{ Str::mask($stunting->NIK, '*', 4,8) }}</a></td>
                                                {{-- <td>{{ Str::mask($stunting->NO_KK, '*', 4,8) }}</td> --}}
                                                <td>{{ $stunting->NAMA_BALITA }}</td>
                                                <td>{{ $stunting->TGL_LAHIR }}</td>
                                                <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                <td><?php
                                                    $tglLahir = new DateTime($stunting->TGL_LAHIR);
                                                    $now = new DateTime('now');
                                                    $umur = $now->diff($tglLahir);
                                                ?>
                                                {{ $umur->format('%y Tahun %m Bulan %d Hari') }}</td>
                                                {{-- <td>{{ $stunting->BERAT_BADAN }} kg</td>
                                                <td>{{ $stunting->TINGGI_BADAN }} cm</td> --}}
                                                <td>{{ $stunting->NAMA_ORANGTUA }}</td>
                                                <td>{{ $stunting->ALAMAT }}</td>
                                                {{-- <td>{{ $stunting->RT }}</td>
                                                <td>{{ $stunting->RW }}</td> --}}
                                                <td>{{ $stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                <td>{{ $stunting->kelurahandesa->NAMA_KELURAHANDESA }}</td>
                                                {{-- <td>{{ $stunting->posyandu->NAMA_POSYANDU }}</td> --}}
                                                <td>
                                                    {{-- STATUS_TBU ='Sangat Pendek' ,'Pendek'--}}
                                                    @if ($stunting->STATUS_TBU == 'Sangat Pendek')
                                                        <span class="badge badge-danger">{{ $stunting->STATUS_TBU }}</span>
                                                    @elseif ($stunting->STATUS_TBU == 'Pendek')
                                                        <span class="badge badge-warning">{{ $stunting->STATUS_TBU }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    {{-- <caption>Showing data from {{ $laporanBalitaresiko->firstItem() }} to {{ $laporanbelumIntervensi->lastItem() }} of {{ $laporanbelumIntervensi->total() }} data.</caption> --}}
                                </div>
                                <div class="float-right">
                                    {{ $laporanBalitaresiko->withQueryString()->links() }}
                                </div>
                            </div>

                            <div class="clearfix mb-3"></div>
                            {{-- Card Body dengan Rekap Count STATUS_TBU --}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Resiko Tinggi Stunting</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="summary">
                                                    <div class="summary-info">
                                                        <h4>{{ $countResikoStuntingSangatPendek }}</h4>
                                                        <div class="text-muted">Balita Stunting dengan Status Sangat Pendek</div>
                                                    </div>
                                                    <div class="summary-footer">
                                                        <a href="{{ route('laporan.balitaResiko') }}">View Details <i class="fas fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Resiko Stunting Pendek</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="summary">
                                                    <div class="summary-info">
                                                        <h4>{{ $countResikoStuntingPendek }}</h4>
                                                        <div class="text-muted">Balita Stunting dengan Status Pendek</div>
                                                    </div>
                                                    <div class="summary-footer">
                                                        <a href="{{ route('laporan.balitaResiko') }}">View Details <i class="fas fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
