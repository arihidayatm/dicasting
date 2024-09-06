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
                                    <label for="stunting_id">Nama Anak Asuh</label>
                                    <select name="stunting_id" id="stunting_id" class="form-control">
                                        @foreach ($stuntings as $stunting)
                                            <option value="{{ $stunting->id }}">{{ $stunting->NAMA_BALITA }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('anakasuhs.index') }}" class="btn btn-secondary">Kembali</a>
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
