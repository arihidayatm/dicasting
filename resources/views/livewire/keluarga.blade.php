@extends('components.layouts.app')

@section('title', 'Keluarga')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/prismjs/themes/prism.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>List Data Keluarga</h1>
                <div class="section-header-button">
                <!-- Tombol Create Data Keluarga -->
                    <button type="button" class="btn btn-primary trigger--createKeluarga">Create Data</button>
                    <button class="btn btn-primary" id="createKeluarga">Create Data</button>
                </div>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('keluargas.index') }}">List Data</a></div>
                    <div class="breadcrumb-item">Keluarga</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('components.layouts.alert')
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Keluarga</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#mycard-collapse"
                                        class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="collapse show"
                                id="mycard-collapse">
                                <div class="card-body">

                                    {{-- You can show or hide this card Data Keluarga --}}
                                    <a class="btn btn-outline-secondary" href="#" role="button">Export</a>
                                    <button type="button" class="btn btn-outline-info"
                                            data-toggle="tooltip"
                                            data-placement="right"
                                            title="Comming Soon.">
                                            Copy
                                    </button>
                                    <div class="float-right">
                                        <form method="GET" action="{{ route('keluargas.index') }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search by Name" name="NAMA_KELUARGA">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="clearfix mb-3"></div>

                                    <div class="table-responsive">
                                        <table class="table-sm table">
                                            <thead class="mb-2">
                                                <tr>
                                                    <th>#</th>
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
                                                @foreach($keluargas as $keluarga => $item)
                                                <tr>
                                                    <td>{{ $keluarga + $keluargas->firstItem() }}</td>
                                                    <td>{{ $item->NO_KK }}</td>
                                                    <td>{{ $item->NIK_AYAH }}</td>
                                                    <td>{{ $item->NAMA_AYAH }}</td>
                                                    <td>{{ $item->NIK_IBU }}</td>
                                                    <td>{{ $item->NAMA_IBU }}</td>
                                                    <td>{{ $item->ALAMAT }}</td>
                                                    <td>{{ $item->NOHP }}</td>
                                                    <td class="text-center">
                                                        <!-- Tombol Edit Data Keluarga -->
                                                        <button wire:click="showEditModal({{ $item->id }})" class="btn btn-sm btn-warning">Edit</button>
                                                        <button wire:click="delete({{ $item->id }})" class="btn btn-sm btn-danger">Delete</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        {{ $keluargas->links() }}
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

        @if (session()->has('success'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '{{ session('success') }}',
                    })
                });
            </script>
        @endif

        @if (session()->has('error'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: '{{ session('error') }}',
                    })
                });
            </script>
        @endif

        @if (session()->has('warning'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: '{{ session('warning') }}',
                    })
                });
            </script>
        @endif

        @if (session()->has('info'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'info',
                        title: 'Info',
                        text: '{{ session('info') }}',
                    })
                });
            </script>
        @endif

        @if (session()->has('question'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'question',
                        title: 'Question',
                        text: '{{ session('question') }}',
                    })
                });
            </script>
        @endif

    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>

@endpush
