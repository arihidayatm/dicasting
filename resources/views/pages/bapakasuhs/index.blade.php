@extends('layouts.app')

@section('title', 'Bapak Ibu Asuh')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Bapak Ibu Asuh</h1>
                <div class="section-header-button">
                    <a href="{{ route('bapakasuhs.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('bapakasuhs.index') }}">Bapak Ibu Asuh</a></div>
                    <div class="breadcrumb-item">List Bapak Ibu Asuh</div>
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
                                <h4>List Bapak Ibu Asuh</h4>
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
                                            <th>Nama Bapak Ibu Asuh</th>
                                            {{-- <th>OPD/Instansi</th> --}}
                                            <th>NIP</th>
                                            <th>Alamat</th>
                                            <th>No. HP</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($bapakasuhs as $bapakasuh)
                                            <tr>
                                                <td>{{ $bapakasuh->NIK_ORANGTUAASUH }}</td>
                                                <td>{{ $bapakasuh->NAMA_ORANGTUAASUH }}</td>
                                                {{-- <td>{{ $bapakasuh->INSTANSI }}</td> --}}
                                                <td>{{ $bapakasuh->NIP }}</td>
                                                <td>{{ $bapakasuh->ALAMAT }}</td>
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
                                                            @csrf
                                                            @method('DELETE')
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
