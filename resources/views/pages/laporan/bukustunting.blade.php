@extends('layouts.app')

@section('title', 'Laporan Buku Stunting')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">

@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laporan Buku Stunting</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('laporan.index') }}">Laporan</a></div>
                    <div class="breadcrumb-item">Buku Stunting</div>
                </div>
            </div>

            <div class="section-body">

            </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>List Buku Stunting</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <form method="GET" action="{{ route('laporan.bukuStunting') }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search by Nama Balita" name="nama_balita">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary"><i class="fas fa-baby"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-4">

                                    </div>

                                    <div class="col-4">
                                        <form method="GET" action="{{ route('laporan.bukuStunting') }}">
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

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>No</th>
                                            <th>Action</th>
                                            <th>Jumlah Intervensi Spesifik</th>
                                            <th>Jumlah Intervensi Sensitif</th>
                                            <th>Jumlah Bapak Asuh</th>
                                            <th>Nama Balita</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Puskesmas</th>
                                            <th>Posyandu</th>
                                        </tr>

                                        @foreach ($laporanStuntings as $stunting)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a href="{{ route('laporan.showbukuStunting', $stunting->id) }}" class="btn btn-primary btn-sm">
                                                        <ion-icon name="book-outline"></ion-icon>
                                                        Detail</a>
                                                </td>
                                                <td>{{ $stunting->intervensiBPAS }}</td>
                                                <td>{{ $stunting->intervensiNonBPAS}}</td>
                                                <td>{{ $stunting->bapakasuh ?$stunting->bapakasuh->count() : 0 }}</td>
                                                <td>{{ $stunting->NAMA_BALITA }}</td>
                                                <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                <td>{{ $stunting->ALAMAT }}</td>
                                                <td>{{ $stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                <td>{{ $stunting->puskesmas->NAMA_PUSKESMAS }}</td>
                                                <td>{{ $stunting->POSYANDU }}</td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $laporanStuntings->withQueryString()->links() }}
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

@endpush
