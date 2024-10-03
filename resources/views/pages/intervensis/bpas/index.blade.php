@extends('layouts.app')

@section('title', 'Intervensi Bapak Ibu Asuh')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Intervensi Bapak Ibu Asuh</h1>
                <div class="section-header-button">
                    <a href="intervensi-bpas.create" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('intervensi-bpas.index') }}">Intervensi</a></div>
                    <div class="breadcrumb-item">Bapak Ibu Asuh</div>
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
                                <h4>Data Balita Yang di Intervensi Bapak Ibu Asuh</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('intervensi-bpas.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search By Name" name="NAMA_BALITA">
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
                                            <th>Nama Bapak Ibu Asuh</th>
                                            <th>Bentuk Intervensi</th>
                                            <th>Nama Balita</th>
                                            <th>Alamat</th>
                                            {{-- <th>Kab/Kota</th> --}}
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($intervensiBPAS as $intervensi_bpas)
                                            <tr>
                                                <td>{{ $intervensi_bpas->bapakasuh->NAMA_ORANGTUAASUH }}</td>
                                                <td>{{ $intervensi_bpas->bentukintervensi->BENTUK_INTERVENSI }}</td>
                                                <td>{{ $intervensi_bpas->stunting->NAMA_BALITA }}</td>
                                                <td>{{ $intervensi_bpas->stunting->ALAMAT }}</td>
                                                {{-- <td>{{ $intervensi_bpas->stunting->kabupatenkota->NAMA_KABKOTA }}</td> --}}
                                                <td>{{ $intervensi_bpas->stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                <td>{{ $intervensi_bpas->stunting->kelurahandesa->NAMA_KELURAHANDESA }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('intervensi-bpas.detail', $intervensi_bpas->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Detail
                                                        </a>

                                                        <form action="{{ route('intervensi-bpas.destroy', $intervensi_bpas->id) }}"
                                                            method="POST" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger btn-icon confirm-delete">
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
                                    {{ $intervensiBPAS->withQueryString()->links() }}
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
