@extends('layouts.app')

@section('title', 'Detail Intervensi')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Intervensi</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('intervensi-nonbpas.index') }}">Intervensi</a></div>
                    <div class="breadcrumb-item">Detail Intervensi</div>
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
                                <h4>Detail Intervensi Bapak Ibu Asuh</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('intervensi-nonbpas.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search By Name" name="NAMA_ORANGTUAASUH">
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
                                            <th>Tanggal Intervensi</th>
                                            <th>Bentuk Intervensi</th>
                                            <th>Nama Balita</th>
                                            {{-- <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th> --}}
                                            <th>Foto Anak</th>
                                            <th>Bukti Kegiatan</th>
                                            <th>Anggaran</th>
                                            <th>Keterangan</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                        @foreach ($detailIntervensis as $detailIntervensi)
                                            <tr>
                                                <td>{{ $detailIntervensi->created_at }}</td>
                                                <td>{{ $detailIntervensi->bentukintervensi->BENTUK_INTERVENSI }}</td>
                                                <td>{{ $detailIntervensi->stunting->NAMA_BALITA }}</td>
                                                {{-- <td>{{ $detailIntervensi->stunting->ALAMAT }}</td>
                                                <td>{{ $detailIntervensi->stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                <td>{{ $detailIntervensi->stunting->kelurahandesa->NAMA_KELURAHANDESA }}</td> --}}
                                                <td>{{ $detailIntervensi->FOTO_ANAK }}</td>
                                                <td>{{ $detailIntervensi->DOKUMENTASI }}</td>
                                                <td>{{ $detailIntervensi->ANGGARAN }}</td>
                                                <td>{{ $detailIntervensi->KETERANGAN }}</td>
                                                {{-- <td>

                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                {{-- <div class="float-right">
                                    {{ $intervensiBPAS->withQueryString()->links() }}
                                </div> --}}
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

    <!-- Page Specific JS File -->
@endpush
