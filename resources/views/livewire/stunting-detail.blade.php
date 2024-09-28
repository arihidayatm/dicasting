@extends('components.layouts.app')

@section('title', 'Stuntings')

@push('style')
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css" rel="stylesheet"/>
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

                <div class="clearfix mb-0"></div>
                {{-- Tab Content --}}
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Balita</h4>
                                    </div>
                                    <div class="widget-main">
                                        <div class="col-4">
                                            <table class="table table-sm">
                                                <tbody>
                                                    <tr>
                                                        <td>No. KTP</td>
                                                        <td>:</td>
                                                        <td>{{ $stunting->NIK }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Balita</td>
                                                        <td>:</td>
                                                        <td>{{ $stunting->NAMA_BALITA }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td>:</td>
                                                        <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="clearfix mb-3"></div>
                                    </div>
                                    <div class="row justify-content-around">
                                        <div class="col-12">
                                            <div class="col-md-12">
                                                {{-- Tabs Navs --}}
                                                <ul class="nav nav-tabs mb-3" id="myTab-icons" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a data-mdb-tab-init class="nav-link active"
                                                            id="dataBalita-icons-tabs-1" href="#dataBalita-icons-tabs-1" role="tab" aria-controls="dataBalita-icons-tabs-1" aria-selected="true">
                                                            <i class="fas fa-chart-pie fa-fw me-2"></i>Biodata Lengkap</a>
                                                        {{-- <button class="nav-link active" id="balita-tab" data-bs-toggle="tab" data-bs-target="#dataBalita" type="button" role="tab" aria-controls="dataBalita" aria-selected="true">Biodata Lengkap</button> --}}
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a data-mdb-tab-init class="nav-link"
                                                            id="dataPertumbuhan-icons-tab-2" href="#dataPertumbuhan-icons-tabs-2" role="tab" aria-controls="dataPertumbuhan-icons-tabs-2" aria-selected="false">
                                                            <i class="fas fa-chart-line fa-fw me-2"></i>Data Berat Badan</a>
                                                        {{-- <button class="nav-link" id="dataBeratBadan-tab" data-bs-toggle="tab" data-bs-target="#dataBeratBadan" type="button" role="tab" aria-controls="dataBeratBadan" aria-selected="true">Data Berat Badan</button> --}}
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a data-mdb-tab-init class="nav-link"
                                                            id="ex-with-icons-tab-3" href="#ex-with-icons-tabs-3" role="tab" aria-controls="ex-with-icons-tabs-3" aria-selected="false">
                                                            <i class="fas fa-cogs fa-fw me-2"></i>Contact</a>
                                                        {{-- <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="true">Contact</button> --}}
                                                    </li>
                                                </ul>

                                                {{-- Tabs Content --}}
                                                <div class="tab-content" id="myTab-icons-content">
                                                    {{-- Biodata Lengkap --}}
                                                    <div class="tab-pane fade show active" id="dataBalita-icons-tabs-1" role="tabpanel" aria-labelledby="dataBalita-icons-tabs-1">
                                                        <div class="row justify-content-around">
                                                            <div class="col-4">
                                                                <div class="card-header">
                                                                    <h4>Data Balita</h4>
                                                                </div>
                                                                <table class="table-striped table">
                                                                    <tbody class="table table-sm">
                                                                        <tr>
                                                                            <th>NIK</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->NIK }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Nama Balita</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->NAMA_BALITA }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Tanggal Lahir</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->TGL_LAHIR }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Jenis Kelamin</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Puskesmas Terdaftar</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->puskesmas->NAMA_PUSKESMAS }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Posyandu</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->POSYANDU }}</td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="card-header">
                                                                    <h4>Data Keluarga</h4>
                                                                </div>
                                                                <table class="table-striped table">
                                                                    <tbody class="table row-md-6">
                                                                        <tr>
                                                                            <th>No. KK</th>
                                                                            <td>{{ $stunting->NO_KK }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Nama Ayah</th>
                                                                            <td>{{ $stunting->NAMA_ORANGTUA }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Nama Ibu</th>
                                                                            <td>{{ $stunting->NAMA_ORANGTUA}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Alamat</th>
                                                                            <td>{{ $stunting->ALAMAT }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>RT/RW</th>
                                                                            <td>{{ $stunting->RT}} / {{ $stunting->RW }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Kecamatan</th>
                                                                            <td>{{ $stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Kelurahan</th>
                                                                            <td>{{ $stunting->kelurahandesa->NAMA_KELURAHANDESA}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Data Pertumbuhan --}}
                                                    <div class="tab-pane fade" id="dataPertumbuhan-icons-tabs-2" role="tabpanel" aria-labelledby="dataPertumbuhan-icons-tabs-2">
                                                        <div class="row justify-content-around">
                                                            <div class="col-4">
                                                                <div class="card-header">
                                                                    <h4>Data Balita</h4>
                                                                </div>
                                                                <table class="table-striped table">
                                                                    <tbody class="table table-sm">
                                                                        <tr>
                                                                            <td>NIK</td>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->NIK }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Nama Balita</td>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->NAMA_BALITA }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Tanggal Lahir</td>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->TGL_LAHIR }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Jenis Kelamin</td>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Nama Ayah</td>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->NAMA_ORANGTUA }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Nama Ibu</td>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->NAMA_ORANGTUA}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="card-header">
                                                                    <h4>Data Keluarga</h4>
                                                                </div>
                                                                <table class="table-striped table">
                                                                    <tbody class="table row-md-6">
                                                                        <tr>
                                                                            <th>No. KK</th>
                                                                            <td>{{ $stunting->NO_KK }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Alamat</th>
                                                                            <td>{{ $stunting->ALAMAT }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>RT/RW</th>
                                                                            <td>{{ $stunting->RT}} / {{ $stunting->RW }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Kecamatan</th>
                                                                            <td>{{ $stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Puskesmas Terdaftar</th>
                                                                            <td>{{ $stunting->puskesmas->NAMA_PUSKESMAS }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Kelurahan</th>
                                                                            <td>{{ $stunting->kelurahandesa->NAMA_KELURAHANDESA}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Contact --}}
                                                    <div class="tab-pane fade" id="ex-with-icons-tabs-3" role="tabpanel" aria-labelledby="ex-with-icons-tab-3">
                                                        Tab 3 content
                                                    </div>
                                                </div>

                                            </div>
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
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
