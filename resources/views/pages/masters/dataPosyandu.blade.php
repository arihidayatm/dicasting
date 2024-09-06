@extends('layouts.app')

@section('title', 'Posyandu')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Posyandu</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('posyandus.index') }}">Data Posyandu</a></div>
                    <div class="breadcrumb-item">Posyandu</div>
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
                                <h4>Data Posyandu</h4>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-outline-secondary" href="#" role="button">Export</a>
                                <button type="button" class="btn btn-outline-info btn-sm">Copy</button>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('posyandus.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search by Name" name="NAMA_POSYANDU">
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
                                            <th>Kode Posyandu</th>
                                            <th>Nama Posyandu</th>
                                            <th>Kab/Kota</th>
                                            <th>Kecamatan</th>
                                            <th>Puskesmas</th>
                                            <th>Desa</th>
                                        </tr>
                                        @foreach ($posyandus as $posyandu)
                                            <tr>
                                                <td>{{ $posyandu->ID_POSYANDU }}</td>
                                                <td>{{ $posyandu->NAMA_POSYANDU }}</td>
                                                <td>{{ $posyandu->kabupatenkota->NAMA_KABKOTA }}</td>
                                                <td>{{ $posyandu->kecamatan->NAMA_KECAMATAN }}</td>
                                                <td>{{ $posyandu->puskesmas->NAMA_PUSKESMAS }}</td>
                                                <td>{{ $posyandu->kelurahandesa->NAMA_KELURAHANDESA }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <caption>Showing data from {{ $posyandus->firstItem() }} to {{ $posyandus->lastItem() }} of {{ $posyandus->total() }} data.</caption>
                                </div>
                                <div class="float-right">
                                    {{ $posyandus->withQueryString()->links() }}
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
