@extends('layouts.app')

@section('title', 'Anak Asuh')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
        <div class="section-header">
            <h1>Edit Data Anak Asuh</h1>
        </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Edit Data Anak Asuh</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('anakasuhs.update', $anakasuh->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="bapak_asuh_id">Nama Bapak Asuh</label>
                                <select name="bapak_asuh_id" id="bapak_asuh_id" class="form-control">
                                    @foreach ($bapakAsuhs as $bapakAsuh)
                                        <option value="{{ $bapakAsuh->id }}" {{ $bapakAsuh->id == $anakasuh->bapak_asuh_id ? 'selected' : '' }}>{{ $bapakAsuh->NAMA_ORANGTUAASUH }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_anak_asuh">Nama Anak Asuh</label>
                                <input type="text" name="nama_anak_asuh" id="nama_anak_asuh" class="form-control" value="{{ $anakasuh->nama_anak_asuh }}" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" required>{{ $anakasuh->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan_id">Kecamatan</label>
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                                    @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}" {{ $kecamatan->id == $anakasuh->kecamatan_id ? 'selected' : '' }}>{{ $kecamatan->NAMA_KECAMATAN }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelurahan_id">Kelurahan</label>
                                <select name="kelurahan_id" id="kelurahan_id" class="form-control">
                                    @foreach ($kelurahans as $kelurahan)
                                        <option value="{{ $kelurahan->id }}" {{ $kelurahan->id == $anakasuh->kelurahan_id ? 'selected' : '' }}>{{ $kelurahan->NAMA_KELURAHANDESA }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control">{{ $anakasuh->keterangan }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
