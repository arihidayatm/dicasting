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
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="balita-tab" data-bs-toggle="tab" data-bs-target="#dataBalita" type="button" role="tab" aria-controls="dataBalita" aria-selected="true">Biodata Lengkap</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="dataBeratBadan-tab" data-bs-toggle="tab" data-bs-target="#dataBeratBadan" type="button" role="tab" aria-controls="dataBeratBadan" aria-selected="false">Data Berat Badan</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="true">Contact</button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="dataBalita" role="tabpanel" aria-labelledby="balita-tab">
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
                                                                    <h4></h4>
                                                                </div>
                                                                <table class="table-striped table">
                                                                    <tbody class="table row-md-6">
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
                                                                            <th>Nama Ayah</th>
                                                                            <td>{{ $stunting->NAMA_ORANGTUA }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Nama Ibu</th>
                                                                            <td>{{ $stunting->NAMA_ORANGTUA}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="dataBeratBadan" role="tabpanel" aria-labelledby="dataBeratBadan-tab">...</div>

                                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
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
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
