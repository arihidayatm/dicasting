@extends('layouts.app')

@section('title', 'Stunting Pengukuran')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Management Data Pengukuran</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('stuntings.index') }}">Management Data</a></div>
                    <div class="breadcrumb-item">Pengukuran</div>
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
                                <h4>Data Pengukuran</h4>
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
                                            <th>RT</th>
                                            <th>RW</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            {{-- <th>Posyandu</th> --}}
                                            {{-- <th>Status BB/U</th> --}}
                                            <th>Status TB/U</th>
                                            {{-- <th>Status BB/TB</th> --}}
                                        </tr>
                                        @foreach ($stuntings as $stunting)
                                            <tr>
                                                <td><a href="{{ route('stuntings.detail', $stunting->id) }}">{{ $stunting->NIK }}</a></td>
                                                <td>{{ $stunting->NO_KK }}</td>
                                                <td>{{ $stunting->NAMA_BALITA }}</td>
                                                <td>{{ $stunting->TGL_LAHIR }}</td>
                                                <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                <td>{{ $stunting->UMUR }} Bulan</td>
                                                <td>{{ $stunting->BERAT_BADAN }} kg</td>
                                                <td>{{ $stunting->TINGGI_BADAN }} cm</td>
                                                <td>{{ $stunting->NAMA_ORANGTUA }}</td>
                                                <td>{{ $stunting->ALAMAT }}</td>
                                                <td>{{ $stunting->RT }}</td>
                                                <td>{{ $stunting->RW }}</td>
                                                <td>{{ $stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                <td>{{ $stunting->kelurahandesa->NAMA_KELURAHANDESA }}</td>
                                                {{-- <td>{{ $stunting->posyandu->NAMA_POSYANDU }}</td> --}}
                                                {{-- <td>{{ $stunting->STATUS_BBU }}</td> --}}
                                                <td>{{ $stunting->STATUS_TBU }}</td>
                                                {{-- <td>{{ $stunting->STATUS_BBTB }}</td> --}}
                                            </tr>
                                        @endforeach
                                    </table>
                                    {{-- <caption>Showing data from {{ $stuntings->firstItem() }} to {{ $stuntings->lastItem() }} of {{ $stuntings->total() }} data.</caption> --}}
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
