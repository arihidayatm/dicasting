@extends('layouts.app')

@section('title', 'Bapak Asuh')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Bapak Asuh</h1>
                <div class="section-header-button">
                    <a href="{{ route('bapakasuhs.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('bapakasuhs.index') }}">Bapak Asuh</a></div>
                    <div class="breadcrumb-item">List Bapak Asuh</div>
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
                                <h4>List Bapak Asuh</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('bapakasuhs.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Bapak Asuh" name="NAMA_ORANGTUAASUH">
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
                                            <th>Nama Bapak Asuh</th>
                                            <th>Alamat</th>
                                            <th>Kab/Kota</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            <th>No. HP</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($bapakasuhs as $bapakasuh)
                                            <tr>
                                                <td>{{ $bapakasuh->NIK_ORANGTUAASUH }}</td>
                                                <td>{{ $bapakasuh->NAMA_ORANGTUAASUH }}</td>
                                                <td>{{ $bapakasuh->ALAMAT }}</td>
                                                <td>{{ $bapakasuh->kabupatenkota->NAMA_KABKOTA }}</td>
                                                <td>{{ $bapakasuh->kecamatan->NAMA_KECAMATAN }}</td>
                                                <td>{{ $bapakasuh->kelurahandesa->NAMA_KELURAHANDESA }}</td>
                                                <td>{{ $bapakasuh->NOHP }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('bapakasuhs.edit', $bapakasuh->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('bapakasuhs.destroy', $bapakasuh->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $bapakasuhs->withQueryString()->links() }}
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
