@extends('layouts.app')

@section('title', 'Documentations')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Documentations</h1>
                <div class="section-header-button">
                    <a href="{{ route('bapakasuhs.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('bapakasuhs.index') }}">Documentations</a></div>
                    <div class="breadcrumb-item">List Documentations</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Documentations</h2>
                <p class="section-lead">
                    You can manage all Documentations, such as editing, deleting and more.
                </p>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>List Documentations</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('bapakasuhs.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Bapak Asuh" nama_bapakasuh="nama_bapakasuh">
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
                                            <th>Kecamatan</th>
                                            <th>Kelurahan</th>
                                            <th>No. Telp</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($bapakasuhs as $bapakasuh)
                                            <tr>

                                                <td>{{ $bapakasuh->nik }}</td>
                                                <td>{{ $bapakasuh->nama_bapakasuh }}</td>
                                                <td>{{ $bapakasuh->alamat }}</td>
                                                <td>{{ $bapakasuh->kecamatan }}</td>
                                                <td>{{ $bapakasuh->kelurahan }}</td>
                                                <td>{{ $bapakasuh->no_telp }}</td>
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
