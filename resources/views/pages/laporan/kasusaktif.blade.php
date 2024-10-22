@extends('layouts.app')

@section('title', 'Laporan Kasus Aktif')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">

@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laporan Kasus Stunting Aktif</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('laporan.index') }}">Laporan</a></div>
                    <div class="breadcrumb-item">Kasus Aktif</div>
                </div>
            </div>

            <div class="section-body"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Kasus Stunting Aktif</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <a class="btn btn-outline-secondary" href="{{route('stunting.export')}}" role="button">Export</a>
                                        <button type="button" class="btn btn-outline-info btn-sm">Copy</button>
                                    </div>
                                    <div class="col-3">
                                        
                                    </div>
                                    <div class="col-3">
                                        <form method="GET" action="{{ route('laporan.kasusAktif') }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search by Name" name="nama_balita">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-3">
                                        <form method="GET" action="{{ route('laporan.kasusAktif') }}">
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
                                            <th>No.KK</th>
                                            <th>Nama Balita</th>
                                            <th>Tgl. Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur</th>
                                            <th>BB Lahir</th>
                                            <th>TB Lahir</th>
                                            <th>Nama Orangtua</th>
                                            <th>Alamat</th>
                                            {{-- <th>RT</th>
                                            <th>RW</th> --}}
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            {{-- <th>Posyandu</th> --}}
                                            <th>Status TB/U</th>
                                        </tr>
                                        @foreach ($laporanStuntings as $stunting)
                                            <tr>
                                                <td><a href="{{ route('stuntings.detailData', $stunting->id) }}">{{ Str::mask($stunting->NIK, '*', 4,8) }}</a></td>
                                                <td>{{ Str::mask($stunting->NO_KK, '*', 4,8) }}</td>
                                                <td>{{ $stunting->NAMA_BALITA }}</td>
                                                <td>{{ $stunting->TGL_LAHIR }}</td>
                                                <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                <td><?php
                                                    $tglLahir = new DateTime($stunting->TGL_LAHIR);
                                                    $now = new DateTime('now');
                                                    $umur = $now->diff($tglLahir);
                                                ?>
                                                {{ $umur->format('%y Tahun %m Bulan %d Hari') }}</td>
                                                <td>{{ $stunting->BERAT_BADAN }} kg</td>
                                                <td>{{ $stunting->TINGGI_BADAN }} cm</td>
                                                <td>{{ $stunting->NAMA_ORANGTUA }}</td>
                                                <td>{{ $stunting->ALAMAT }}</td>
                                                {{-- <td>{{ $stunting->RT }}</td>
                                                <td>{{ $stunting->RW }}</td> --}}
                                                <td>{{ $stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                <td>{{ $stunting->kelurahandesa->NAMA_KELURAHANDESA }}</td>
                                                {{-- <td>{{ $stunting->posyandu->NAMA_POSYANDU }}</td> --}}
                                                <td>{{ $stunting->STATUS_TBU }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    {{-- <caption>Showing data from {{ $laporanStuntings->firstItem() }} to {{ $laporanStuntings->lastItem() }} of {{ $laporanStuntings->total() }} data.</caption> --}}
                                </div>
                                <div class="float-right">
                                    {{ $laporanStuntings->withQueryString()->links() }}
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
