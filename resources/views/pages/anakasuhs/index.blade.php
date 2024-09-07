@extends('layouts.app')

@section('title', 'Anak Asuh')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Anak Asuh</h1>
            <div class="section-header-button">
                <a href="{{ route('anakasuhs.create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('anakasuhs.index') }}">Anak Asuh</a></div>
                <div class="breadcrumb-item">List Anak  Asuh</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>List Data Anak Asuh</h4>
                </div>

                <div class="card-body">
                    <div class="float-right">
                        <form method="GET" action="{{ route('anakasuhs.index') }}">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Anak Asuh" name="NAMA_BALITA">
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="clearfix mb-3"></div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Bapak Asuh</th>
                                        <th>No. HP</th>
                                        <th>Nama Anak Asuh</th>
                                        <th>Alamat</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anakAsuhs as $anakasuh)
                                        <tr>
                                            <td>{{ $anakasuh->bapakAsuh->NAMA_ORANGTUAASUH }}</td>
                                            <td>{{ $anakasuh->bapakAsuh->NOHP }}</td>
                                            <td>{{ $anakasuh->stunting->NAMA_BALITA }}</td>
                                            <td>{{ $anakasuh->stunting->ALAMAT }}</td>
                                            <td>{{ $anakasuh->stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                            <td>{{ $anakasuh->stunting->kelurahandesa->NAMA_KELURAHANDESA }}</td>
                                            <td>
                                                <a href="{{ route('anakasuhs.edit', $anakasuh->id) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('anakasuhs.destroy', $anakasuh->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">
                                {{ $anakAsuhs->withQueryString()->links() }}
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

