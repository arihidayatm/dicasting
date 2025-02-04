@extends('layouts.app')

@section('title', 'Puskesmas')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Puskesmas</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('puskesmas.index') }}">Data Puskesmas</a></div>
                    <div class="breadcrumb-item">Puskesmas</div>
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
                                <h4>Data Puskesmas</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#mycard-collapse"
                                        class="btn btn-icon btn-info"
                                        href="#"><i class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="collapse show"
                                id="mycard-collapse">
                                <div class="card-body">
                                    {{-- You can show or hide this card Data Puskesmas --}}
                                    {{-- <div class="card-body"> --}}
                                        <a class="btn btn-outline-secondary" href="#" role="button">Export</a>
                                        <button type="button" class="btn btn-outline-info btn-sm">Copy</button>
                                        <div class="float-right">
                                            <form method="GET" action="{{ route('puskesmas.index') }}">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search by Name" name="NAMA_PUSKESMAS">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="clearfix mb-3"></div>

                                        <div class="table-responsive">

                                            <table class="table-striped-sm table">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Kode Puskesmas</th>
                                                    <th>Nama Puskesmas</th>
                                                    <th>Kab/Kota</th>
                                                    <th>Kecamatan</th>
                                                    <th>Alamat</th>
                                                    <th>No. Telp</th>
                                                </tr>
                                                @foreach ($puskesmas as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->ID_PUSKESMAS }}</td>
                                                        <td>{{ $item->NAMA_PUSKESMAS }}</td>
                                                        <td>{{ $item->kabupatenkota->NAMA_KABKOTA }}</td>
                                                        <td>{{ $item->kecamatan->NAMA_KECAMATAN }}</td>
                                                        <td>{{ $item->ALAMAT_PUSKESMAS }}</td>
                                                        <td>{{ $item->NOTELP_PUSKESMAS }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                            <caption>Showing data from {{ $puskesmas->firstItem() }} to {{ $puskesmas->lastItem() }} of {{ $puskesmas->total() }} data.</caption>
                                        </div>
                                        <div class="float-right">
                                            {{ $puskesmas->withQueryString()->links() }}
                                        </div>
                                    {{-- </div> --}}
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
