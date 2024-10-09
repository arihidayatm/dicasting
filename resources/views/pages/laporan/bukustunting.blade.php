@extends('layouts.app')

@section('title', 'Laporan Buku Stunting')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">

@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laporan Buku Stunting</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('laporan.index') }}">Laporan</a></div>
                    <div class="breadcrumb-item">Buku Stunting</div>
                </div>
            </div>

            <div class="section-body"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Buku Stunting</h4>
                            </div>
                            {{-- <div class="card-body">
                                <div class="float-left col-6">
                                    <form method="GET" action="{{ route('laporan.bukuStunting') }}">
                                        <div class="form-group">
                                            <select class="form-control" id="nama_kecamatan" name="nama_kecamatan" onchange="this.form.submit()">
                                                <option value="">-- Pilih Kecamatan --</option>
                                                @foreach($kecamatans as $kecamatan)
                                                    <option value="{{ $kecamatan->NAMA_KECAMATAN }}" {{ request('nama_kecamatan') == $kecamatan->NAMA_KECAMATAN ? 'selected' : '' }}>
                                                        {{ $kecamatan->NAMA_KECAMATAN }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                        {{-- </div>
                    </div>
                </div> --}}
                {{-- <div class="row">
                    <div class="col-12">
                        @if (request('nama_kecamatan'))
                        <div class="card">
                            <div class="card-header">
                                <h4>Buku Stunting</h4> --}}
                                <div class="float-left col-3">
                                    <form action="{{ route('laporan.bukuStunting') }}" method="GET">
                                        <div class="input-group float-right">
                                            <input type="text" class="form-control" placeholder="Search by Nama Balita" name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA BALITA</th>
                                            <th>JENIS KELAMIN</th>
                                            <th>ALAMAT</th>
                                            <th>KECAMATAN</th>
                                            <th>PUSKESMAS</th>
                                            <th>Action</th>
                                        </tr>

                                        @foreach ($stuntings as $stunting)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $stunting->NAMA_BALITA }}</td>
                                                <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                <td>{{ $stunting->ALAMAT }}</td>
                                                <td>{{ $stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                <td>{{ $stunting->puskesmas->NAMA_PUSKESMAS }}</td>
                                                <td>
                                                    <a href="{{ route('laporan.showbukuStunting', $stunting->id) }}" class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                            {{-- <div class="float-right">
                                {{ $stuntings->withQueryString()->links() }}
                            </div> --}}

                        {{-- @else
                            <div class="card-body">
                                <div class="table-responsive" id="id">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Balita</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Puskesmas</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center">Silakan pilih Kecamatan terlebih dahulu.</td>
                                        </tr>
                                    </table>
                                </div>

                                <script>
                                    $('#nama_kecamatan').change(function() {
                                        var nama_kecamatan = $(this).val();
                                        $.ajax({
                                            url: "{{ route('stuntings.index') }}",
                                            method: "GET",
                                            data: {
                                                nama_kecamatan: nama_kecamatan
                                            },
                                            success: function(data) {
                                                $('#id').html(data);
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        @endif --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

@endpush
