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
            <h1>Tambah Data Anak Asuh</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('anakasuhs.index') }}">Anak Asuh</a></div>
                <div class="breadcrumb-item">Add Anak  Asuh</div>
            </div>
        </div>



                <div class="section-body">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Data Anak Asuh</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('anakasuhs.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="bapak_asuh_id">Nama Bapak Asuh</label>
                                    <select name="bapak_asuh_id" id="bapak_asuh_id" class="form-control">
                                        @foreach ($bapakAsuhs as $bapakAsuh)
                                            <option value="{{ $bapakAsuh->id }}">{{ $bapakAsuh->NAMA_ORANGTUAASUH }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_anak_asuh">Nama Anak Asuh</label>
                                    <input type="text" name="nama_anak_asuh" id="nama_anak_asuh" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan_id">Kecamatan</label>
                                    <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                                        @foreach ($kecamatans as $kecamatan)
                                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->NAMA_KECAMATAN }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelurahan_id">Kelurahan</label>
                                    <select name="kelurahan_id" id="kelurahan_id" class="form-control">
                                        @foreach ($kelurahans as $kelurahan)
                                            <option value="{{ $kelurahan->id }}">{{ $kelurahan->NAMA_KELURAHANDESA }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
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
