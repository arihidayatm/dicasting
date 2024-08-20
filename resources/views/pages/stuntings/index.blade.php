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
                                            <th>Sumber Data</th>
                                            <th>Tanggal Pengukuran</th>
                                            <th>NIK</th>
                                            <th>No.KK</th>
                                            <th>Nama Balita</th>
                                            <th>Tgl. Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Usia</th>
                                            <th>BB Lahir</th>
                                            <th>TB Lahir</th>
                                            <th>Nama Ibu</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Kelurahan</th>
                                            <th>Status TB/U</th>
                                        </tr>
                                        @foreach ($stuntings as $stunting)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('stuntings.create') }}" class="btn btn-primary">Add</a>
                                                </td>
                                                <td>{{ $stunting->tgl_pengukuran }}</td>
                                                <td>{{ $stunting->NIK }}</td>
                                                <td>{{ $stunting->NO_KK }}</td>
                                                <td>{{ $stunting->NAMA_BALITA }}</td>
                                                <td>{{ $stunting->TGL_LAHIR }}</td>
                                                <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                <td>{{ $stunting->UMUR }}</td>
                                                <td>{{ $stunting->BERAT_BADAN }}</td>
                                                <td>{{ $stunting->TINGGI_BADAN }}</td>
                                                <td>{{ $stunting->NAMA_IBU }}</td>
                                                <td>{{ $stunting->ALAMAT }}</td>
                                                <td>{{ $stunting->NAMA_KECAMATAN }}</td>
                                                <td>{{ $stunting->NAMA_KELURAHANDESA }}</td>
                                                <td>{{ $stunting->STATUS_TBU }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
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
                                <div class="">
                                    <a href="{{ route('stuntings.create') }}" class="btn btn-primary">Add New</a>
                                </div>
                            </div>
                            <div class="card-body">

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
                                            <th>Sumber Data</th>
                                            <th>Tanggal Pengukuran</th>
                                            <th>NIK</th>
                                            <th>No.KK</th>
                                            <th>Nama Balita</th>
                                            <th>Tgl. Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Usia</th>
                                            <th>BB Lahir</th>
                                            <th>TB Lahir</th>
                                            <th>Nama Ibu</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Kelurahan</th>
                                            <th>Status TB/U</th>
                                        </tr>
                                        @foreach ($stuntings as $stunting)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('stuntings.create') }}" class="btn btn-primary">Add</a>
                                                </td>
                                                <td>{{ $stunting->tgl_pengukuran }}</td>
                                                <td>{{ $stunting->NIK }}</td>
                                                <td>{{ $stunting->NO_KK }}</td>
                                                <td>{{ $stunting->NAMA_BALITA }}</td>
                                                <td>{{ $stunting->TGL_LAHIR }}</td>
                                                <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                <td>{{ $stunting->UMUR }}</td>
                                                <td>{{ $stunting->BERAT_BADAN }}</td>
                                                <td>{{ $stunting->TINGGI_BADAN }}</td>
                                                <td>{{ $stunting->NAMA_IBU }}</td>
                                                <td>{{ $stunting->ALAMAT }}</td>
                                                <td>{{ $stunting->NAMA_KECAMATAN }}</td>
                                                <td>{{ $stunting->NAMA_KELURAHANDESA }}</td>
                                                <td>{{ $stunting->STATUS_TBU }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $stuntings->withQueryString()->links() }}
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
