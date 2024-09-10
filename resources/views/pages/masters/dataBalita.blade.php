@extends('layouts.app')

@section('title', 'Balita')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Balita</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('balitas.index') }}">Data Balita</a></div>
                    <div class="breadcrumb-item">Balita</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Balita</h4>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-outline-secondary" href="{{ route('balitas.export') }}" role="button">Export</a>
                                <button type="button" class="btn btn-outline-info btn-sm">Copy</button>
                                <form action="/balitas/import" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file" class="form-control">
                                    <button type="submit" class="btn btn-outline-success btn-sm">Import</button>
                                </form>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('balitas.index') }}">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search by Name" name="NAMA_BALITA">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">

                                    <table class="table-striped table">
                                        <tr>
                                            <th>NIK</th>
                                            <th>No. KK</th>
                                            <th>Nama Balita</th>
                                            <th>Tgl. Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nama Ibu</th>
                                            <th>Alamat</th>
                                            <th>RT</th>
                                            <th>RW</th>
                                            <th>Kab/Kota</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            <th>Puskesmas</th>
                                            {{-- <th>Posyandu</th> --}}
                                        </tr>
                                        @foreach ($balitas as $balita)
                                            <tr>
                                                <td>{{ $balita->NIK }}</td>
                                                <td>{{ $balita->NO_KK }}</td>
                                                <td>{{ $balita->NAMA_BALITA }}</td>
                                                <td>{{ $balita->TGL_LAHIR }}</td>
                                                <td>{{ $balita->JENIS_KELAMIN }}</td>
                                                <td>{{ $balita->NAMA_ORANGTUA }}</td>
                                                <td>{{ $balita->ALAMAT }}</td>
                                                <td>{{ $balita->RT }}</td>
                                                <td>{{ $balita->RW }}</td>
                                                <td>{{ $balita->kabupatenkota->NAMA_KABKOTA }}</td>
                                                <td>{{ $balita->kecamatan->NAMA_KECAMATAN }}</td>
                                                <td>{{ $balita->kelurahandesa->NAMA_KELURAHANDESA }}</td>
                                                <td>{{ $balita->puskesmas->NAMA_PUSKESMAS }}</td>
                                                {{-- <td>{{ $balita->posyandu->NAMA_POSYANDU }}</td> --}}
                                            </tr>
                                        @endforeach
                                    </table>
                                    <caption>Showing data from {{ $balitas->firstItem() }} to {{ $balitas->lastItem() }} of {{ $balitas->total() }} data.</caption>
                                </div>
                                <div class="float-right">
                                    {{ $balitas->withQueryString()->links() }}
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
