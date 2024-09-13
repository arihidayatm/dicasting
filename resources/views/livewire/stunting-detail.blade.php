@extends('components.layouts.app')

@section('title', 'Stuntings')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Data Balita</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('stuntings.index') }}">Detail Data</a></div>
                    <div class="breadcrumb-item">Balita</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                {{-- <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Balita</h4>
                            </div>
                                <div class="card-body">
                                    <p>NIK: {{ $stunting->NIK }}</p>
                                    <p>Nama Anak: {{ $stunting->NAMA_BALITA }}</p>
                                    <p>Tanggal Lahir: {{ $stunting->TGL_LAHIR }}</p>
                                    <p>Jenis Kelamin: {{ $stunting->JENIS_KELAMIN }}</p>
                                    <p>Umur: {{ $stunting->UMUR }}</p>
                                    <p>Nama Orang Tua: {{ $stunting->NAMA_ORANGTUA }}</p>
                                    <p>Alamat: {{ $stunting->ALAMAT }}</p>
                                    <p>Kecamatan: {{ $stunting->kecamatan->NAMA_KECAMATAN }}</p>
                                    <p>Desa: {{ $stunting->kelurahandesa->NAMA_KELURAHANDESA }}</p>
                                </div>
                                <div class="card-footer text-right">
                                    <a href="{{ route('stuntings.index') }}" class="btn btn-secondary">Back</a>
                                </div>
                        </div>
                    </div>
                </div> --}}

                <div class="clearfix mb-3"></div>
                {{-- Tab Content --}}
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Detail Data Balita</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table-striped table">
                                                <tr>
                                                    <th>NIK</th>
                                                    <td>{{ $stunting->NIK }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Balita</th>
                                                    <td>{{ $stunting->NAMA_BALITA }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Lahir</th>
                                                    <td>{{ $stunting->TGL_LAHIR }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis Kelamin</th>
                                                    <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Umur</th>
                                                    <td>{{ $stunting->UMUR }}</td>                                              </tr>
                                                <tr>
                                                    <th>Nama Orang Tua</th>
                                                    <td>{{ $stunting->NAMA_ORANGTUA }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td>{{ $stunting->ALAMAT }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kecamatan</th>
                                                    <td>{{ $stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Desa</th>
                                                    <td>{{ $stunting->kelurahandesa->NAMA_KELURAHANDESA }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="card-footer text-right">
                                            <a href="{{ route('stuntings.index') }}" class="btn btn-secondary">Back</a>
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
