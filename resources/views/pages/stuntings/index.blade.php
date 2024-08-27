@extends('layouts.app')

@section('title', 'Stuntings')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Management Data Stunting</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('stuntings.index') }}">Management Data</a></div>
                    <div class="breadcrumb-item">Stuntings</div>
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
                                <h4>Data Stunting</h4>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-outline-secondary" href="{{route('stunting.export')}}" role="button">Export</a>
                                <button type="button" class="btn btn-outline-info btn-sm">Copy</button>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('stuntings.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search by Name" name="nama_balita">
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
                                            <th>No.KK</th>
                                            <th>Nama Balita</th>
                                            <th>Tgl. Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur</th>
                                            <th>BB Lahir</th>
                                            <th>TB Lahir</th>
                                            <th>Nama Ibu</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Kelurahan</th>
                                            <th>Status BB/U</th>
                                            <th>Status TB/U</th>
                                            <th>Status BB/TB</th>
                                        </tr>
                                        @foreach ($stuntings as $stunting)
                                            <tr>
                                                <td>{{ $stunting->NIK }}</td>
                                                <td>{{ $stunting->NO_KK }}</td>
                                                <td>{{ $stunting->NAMA_BALITA }}</td>
                                                <td>{{ $stunting->TGL_LAHIR }}</td>
                                                <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                <td>{{ number_format(abs($stunting->UMUR)) }} Bulan</td>
                                                <td>{{ $stunting->BERAT_BADAN }} gram</td>
                                                <td>{{ $stunting->TINGGI_BADAN }} cm</td>
                                                <td>{{ $stunting->NAMA_ORANGTUA }}</td>
                                                <td>{{ $stunting->ALAMAT }}</td>
                                                <td>{{ optional($stunting->kecamatan)->NAMA_KECAMATAN }}</td>
                                                <td>{{ optional($stunting->kelurahandesa)->NAMA_KELURAHANDESA }}</td>
                                                <td>{{ $stunting->STATUS_BBU }}</td>
                                                <td>{{ $stunting->STATUS_TBU }}</td>
                                                <td>{{ $stunting->STATUS_BBTB }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <caption>Showing data from {{ $stuntings->firstItem() }} to {{ $stuntings->lastItem() }} of {{ $stuntings->total() }} data.</caption>
                                </div>
                                <div class="float-right">
                                    {{ $stuntings->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Penambahan Data Stunting</h4>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-outline-primary" href="{{ route('stuntings.create')}}" role="button">Tambah Data</a>

                                <div class="float-right">
                                    <form method="GET" action="{{ route('stuntings.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search by Name" name="nama_balita">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive" >
                                    <table class="table-striped table">
                                        <tr class="table">
                                            <th>Sumber Data</th>
                                            <th>Tanggal Pengukuran</th>
                                            <th>NIK</th>
                                            <th>No.KK</th>
                                            <th>Nama Balita</th>
                                            <th>Tgl. Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur</th>
                                            <th>BB Lahir</th>
                                            <th>TB Lahir</th>
                                            <th>Nama Ibu</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Kelurahan</th>
                                            <th>Status BB/U</th>
                                            <th>Status TB/U</th>
                                            <th>Status BB/TB</th>
                                        </tr>
                                        @foreach ($stuntings as $stunting)
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn btn-outline-warning float-right" data-toggle="modal" data-target="#updateModal">
                                                        Update
                                                    </button>
                                                </td>
                                                <td>{{ $stunting->tgl_pengukuran }}</td>
                                                <td>{{ $stunting->NIK }}</td>
                                                <td>{{ $stunting->NO_KK }}</td>
                                                <td>{{ $stunting->NAMA_BALITA }}</td>
                                                <td>{{ $stunting->TGL_LAHIR }}</td>
                                                <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                <td>{{ number_format(abs($stunting->UMUR)) }} Bulan</td>
                                                <td>{{ $stunting->BERAT_BADAN }} gram</td>
                                                <td>{{ $stunting->TINGGI_BADAN }} cm</td>
                                                <td>{{ $stunting->NAMA_ORANGTUA }}</td>
                                                <td>{{ $stunting->ALAMAT }}</td>
                                                <td>{{ optional($stunting->kecamatan)->NAMA_KECAMATAN }}</td>
                                                <td>{{ optional($stunting->kelurahandesa)->NAMA_KELURAHANDESA }}</td>
                                                <td>{{ $stunting->STATUS_BBU }}</td>
                                                <td>{{ $stunting->STATUS_TBU }}</td>
                                                <td>{{ $stunting->STATUS_BBTB }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <caption>Showing data from {{ $stuntings->firstItem() }} to {{ $stuntings->lastItem() }} of {{ $stuntings->total() }} data.</caption>
                                </div>
                                <div class="float-right">
                                    {{ $stuntings->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                <caption>Sumber Rumusan: *Peraturan Menteri Kesehatan (Permenkes) No. 2 Tahun 2020 tentang Standar Antropometri Anak </caption>
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
