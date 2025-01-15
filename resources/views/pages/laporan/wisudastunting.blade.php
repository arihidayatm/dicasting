@extends('layouts.app')

@section('title', 'Laporan Wisuda Stunting')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">

@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laporan Wisuda Stunting</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('laporan.index') }}">Laporan</a></div>
                    <div class="breadcrumb-item">Wisuda Stunting</div>
                </div>
            </div>

            <div class="section-body"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Wisuda Stunting</h4>
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
                                    <form method="GET" action="{{ route('laporan.wisudaStunting') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search by Name" name="nama_balita">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="col-3">
                                        <form method="GET" action="{{ route('laporan.wisudaStunting') }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search by Kecamatan" name="nama_kecamatan">
                                                <div class="input-group-append">
                                                    <button class="btn btn-warning"><i class="fa-solid fa-square-plus"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">

                                    <table class="table-striped table">
                                        <tr>
                                            <th>NIK</th>
                                            {{-- <th>No.KK</th> --}}
                                            <th>Nama Balita</th>
                                            <th>Tgl. Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur</th>
                                            {{-- <th>BB Lahir</th> --}}
                                            {{-- <th>TB Lahir</th> --}}
                                            <th>Nama Orangtua</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                        </tr>
                                        @foreach ($wisudaStuntings as $stunting)
                                            <tr>
                                                <td>{{ Str::mask($stunting->NIK, '*', 4,8) }}</td>
                                                {{-- <td>{{ Str::mask($stunting->NO_KK, '*', 4,8) }}</td> --}}
                                                <td>{{ $stunting->NAMA_BALITA }}</td>
                                                <td>{{ $stunting->TGL_LAHIR }}</td>
                                                <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                <td>
                                                    <?php
                                                        $tglLahir = new DateTime($stunting->TGL_LAHIR);
                                                        $now = new DateTime('now');
                                                        $umur = $now->diff($tglLahir);
                                                    ?>
                                                    {{ $umur->format('%y Tahun %m Bulan %d Hari') }}
                                                </td>
                                                {{-- <td>{{ $stunting->BERAT_BADAN }} kg</td> --}}
                                                {{-- <td>{{ $stunting->TINGGI_BADAN }} cm</td> --}}
                                                <td>{{ $stunting->NAMA_ORANGTUA }}</td>
                                                <td>{{ $stunting->ALAMAT }}</td>
                                                <td>{{ $stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                <td>{{ $stunting->kelurahandesa->NAMA_KELURAHANDESA }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <caption>Showing data from {{ $wisudaStuntings->firstItem() }} to {{ $wisudaStuntings->lastItem() }} of {{ $wisudaStuntings->total() }} data.</caption>
                                </div>
                                <div class="float-right">
                                    {{ $wisudaStuntings->withQueryString()->links() }}
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
