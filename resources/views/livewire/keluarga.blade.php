@extends('components.layouts.app')

@section('title', 'Keluarga')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Data Keluarga</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('keluargas.index') }}">Detail Data</a></div>
                    <div class="breadcrumb-item">Keluarga</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('components.layouts.alert')
                    </div>
                </div>

                <div class="clearfix mb-3"></div>
                {{-- Tab Content --}}
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Detail Keluarga</h4>
                                    </div>

                                    <div class="row justify-content-around">
                                        <div class="col-12">
                                            <table class="table-striped table">
                                                <tbody class="table row-md-6">
                                                    <tr>
                                                        <th>NO KK</th>
                                                        <th>NIK AYAH</th>
                                                        <th>Nama Ayah</th>
                                                        <th>NIK IBU</th>
                                                        <th>Nama Ibu</th>
                                                        <th>Alamat</th>
                                                        <th>No. HP</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($keluargas as $keluarga)
                                                    <tr>
                                                        <td>{{ $keluarga->NO_KK }}</td>
                                                        <td>{{ $keluarga->NIK_AYAH }}</td>
                                                        <td>{{ $keluarga->NAMA_AYAH }}</td>
                                                        <td>{{ $keluarga->NIK_IBU }}</td>
                                                        <td>{{ $keluarga->NAMA_IBU }}</td>
                                                        <td>{{ $keluarga->ALAMAT }}</td>
                                                        <td>{{ $keluarga->NOHP }}</td>
                                                        <td class="text-center">
                                                            {{-- <a href="{{ route('keluargas.edit', $keluarga->id) }}" class="btn btn-sm btn-primary">Edit</a> --}}
                                                            <button wire:click="delete({{ $keluarga->id }})" class="btn btn-sm btn-danger">Delete</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
    <div class="d-flex justify-content-center">
        {{-- {{ $keluargas->links() }} --}}
        {{ $keluargas->links('pagination::bootstrap-4') }}
    </div>
@endsection


@push('scripts')
    <!-- JS Libraies -->
    {{-- <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script> --}}

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
