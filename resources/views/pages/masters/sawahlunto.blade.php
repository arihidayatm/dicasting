@extends('layouts.app')

@section('title', 'Kota Sawahlunto')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">

@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kota Sawahlunto</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Kota Sawahlunto</a></div>
                    <div class="breadcrumb-item">Filter Wilayah</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Wilayah Sawahlunto</h4>
                            </div>
                            <div class="card-body">
                                    <div class="row mt-4">
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <select id="selectKecamatan" name="NAMA_KECAMATAN" class="form-control select2" aria-label="Default select example">
                                                    <option selected>Pilih Kecamatan</option>
                                                    {{-- @foreach ($kecamatans as $kecamatan)
                                                        <option value="{{ $kecamatan->NAMA_KECAMATAN }}">{{ $kecamatan->NAMA_KECAMATAN }}</option>
                                                    @endforeach --}}

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label>Kelurahan Desa</label>
                                                <select id="selectKelurahandesa" name="NAMA_KELURAHANDESA" class="form-control select2" aria-label="Default select example">
                                                    <option selected>Pilih Kelurahan/Desa</option>

                                                </select>
                                            </div>
                                        </div>
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
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            
            $("#selectKecamatan").select2({
                placeholder: 'Pilih Kecamatan',
                ajax: {
                    url: "{{ route('kecamatan.index') }}",
                    processResults: function({data}) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.ID,
                                    text: item.NAMA_KECAMATAN
                                }
                            })
                        }
                    }
                }
            });

            $("#selectKecamatan").change(function() {
                let id = $('#selectKecamatan').val();

                $("#selectKelurahandesa").select2({
                    placeholder: 'Pilih Kelurahan/Desa',
                    ajax: {
                        url: "{{ url('selectKelurahandesa') }}/"+ ID,
                        processResults: function({data}) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.ID,
                                        text: item.NAMA_KELURAHANDESA
                                    }
                                })
                            }
                        }
                    }
                });
            });
        });
    </script>
    <!-- Page Specific JS File -->

@endpush