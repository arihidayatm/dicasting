@extends('layouts.app')

@section('title', 'Add Non Bapak Ibu Asuh')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Bapak Ibu Asuh</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('nonbapakasuhs.index') }}">Non Bapak Ibu Asuh</a></div>
                    <div class="breadcrumb-item">Add</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Add Non Bapak Ibu Asuh</h2>
                <div class="card">
                    <form action="{{ route('nonbapakasuhs.store')}}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Form Add Non Bapak Ibu Asuh</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <input type="text" class="form-control @error('KODE_NONORANGTUAASUH') is-invalid @enderror" name="KODE_NONORANGTUAASUH" value="{{ old('KODE_NONORANGTUAASUH') }}">
                                        @error('KODE_NONORANGTUAASUH')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Nama Non Bapak Asuh</label>
                                <input type="text" class="form-control @error('NAMA_NONORANGTUAASUH') is-invalid @enderror" name="NAMA_NONORANGTUAASUH" value="{{ old('NAMA_NONORANGTUAASUH') }}">
                                @error('NAMA_NONORANGTUAASUH')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control @error('ALAMAT') is-invalid @enderror" name="ALAMAT" value="{{ old('ALAMAT') }}">
                                @error('ALAMAT')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No. HP</label>
                                <input type="number" class="form-control" name="NOHP" value="{{ old('NOHP') }}">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                            <a href="{{ route('nonbapakasuhs.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush

{{-- <script>
    $(document).ready(function() {
        $('#kabupatenkota_id').change(function() {
            var kabupaten_id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '/get-kecamatan/' + kabupaten_id,
                success: function(data) {
                    $('#kecamatan_id').empty();
                    $.each(data, function(index, value) {
                        $('#kecamatan_id').append('<option value="' + value.id + '">' + value.nama_kecamatan + '</option>');
                    });
                }
            });
        });

        $('#kecamatan_id').change(function() {
            var kecamatan_id = $(this).val();
            $.ajax({
                type: 'GET',
                url: '/get-kelurahandesa/' + kecamatan_id,
                success: function(data) {
                    $('#kelurahandesa_id').empty();
                    $.each(data, function(index, value) {
                        $('#kelurahandesa_id').append('<option value="' + value.id + '">' + value.nama_kelurahan + '</option>');
                    });
                }
            });
        });
    });
</script> --}}
