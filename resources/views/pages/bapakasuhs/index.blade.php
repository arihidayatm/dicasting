@extends('layouts.app')

@section('title', 'Bapak Ibu Asuh')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Bapak Ibu Asuh</h1>
                <div class="section-header-button">
                    {{-- <a href="{{ route('bapakasuhs.create') }}" class="btn btn-primary">Add New</a> --}}
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createModal">
                        Add Bapak Ibu Asuh
                    </button>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('bapakasuhs.index') }}">Bapak Ibu Asuh</a></div>
                    <div class="breadcrumb-item">List Bapak Ibu Asuh</div>
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
                                <h4>List Bapak Ibu Asuh</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('bapakasuhs.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Bapak Asuh" name="NAMA_ORANGTUAASUH">
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
                                            <th>NIK</th>
                                            <th>Nama Bapak Ibu Asuh</th>
                                            {{-- <th>OPD/Instansi</th> --}}
                                            <th>NIP</th>
                                            <th>Alamat</th>
                                            <th>No. HP</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($bapakasuhs as $bapakasuh)
                                            <tr>
                                                <td>{{ $bapakasuh->NIK_ORANGTUAASUH }}</td>
                                                <td>{{ $bapakasuh->NAMA_ORANGTUAASUH }}</td>
                                                {{-- <td>{{ $bapakasuh->INSTANSI }}</td> --}}
                                                <td>{{ $bapakasuh->NIP }}</td>
                                                <td>{{ $bapakasuh->ALAMAT }}</td>
                                                <td>{{ $bapakasuh->NOHP }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        {{-- <a href='{{ route('bapakasuhs.edit', $bapakasuh->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a> --}}
                                                        <button type="button" class="btn btn-sm btn-warning btn-icon"
                                                            data-toggle="modal" data-target="#editModal{{ $bapakasuh->id }}">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </button>

                                                        <form action="{{ route('bapakasuhs.destroy', $bapakasuh->id) }}"
                                                            method="POST" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger"
                                                                data-confirm="Realy?|Do you want to continue?"
                                                                data-confirm-yes="alert('Deleted :)');">
                                                                <i class="fas fa-trash"></i>
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $bapakasuhs->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                    <!-- Edit Modal -->
                                    @foreach($bapakasuhs as $bapakasuh)
                                    <div class="modal fade" id="editModal{{ $bapakasuh->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $bapakasuh->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $bapakasuh->id }}">Edit Bapak Ibu Asuh</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('bapakasuhs.update', $bapakasuh->id) }}">
                                                        @csrf
                                                        {{-- @method('PUT') --}}
                                                        <div class="form-group">
                                                            <label>NIK</label>
                                                            <input type="text"
                                                                class="form-control @error('NIK_ORANGTUAASUH') is-invalid @enderror"
                                                                name="NIK_ORANGTUAASUH" value="{{ $bapakasuh->NIK_ORANGTUAASUH }}">
                                                            @error('NIK_ORANGTUAASUH')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Nama Bapak Asuh</label>
                                                            <input type="text"
                                                                class="form-control @error('NAMA_ORANGTUAASUH') is-invalid @enderror"
                                                                name="NAMA_ORANGTUAASUH" value="{{ $bapakasuh->NAMA_ORANGTUAASUH }}">
                                                            @error('NAMA_ORANGTUAASUH')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label>NIP</label>
                                                            <input type="text"
                                                                class="form-control @error('NIP') is-invalid @enderror"
                                                                name="NIP" value="{{ $bapakasuh->NIP }}">
                                                            @error('NIP')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <input type="text"
                                                                class="form-control @error('ALAMAT') is-invalid @enderror"
                                                                name="ALAMAT" value="{{ $bapakasuh->ALAMAT }}">
                                                            @error('ALAMAT')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label>No. HP</label>
                                                            <input type="number"
                                                                class="form-control"
                                                                name="NOHP" value="{{ $bapakasuh->NOHP }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    {{-- End of edit modal --}}

                                    <!-- Create Modal -->
                                    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="createModalLabel">Add Bapak Ibu Asuh</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('bapakasuhs.store')}}" method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>NIK</label>
                                                            <input type="text"
                                                                class="form-control"
                                                                name="NIK_ORANGTUAASUH" value="{{ $bapakasuh->NIK_ORANGTUAASUH }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Nama Bapak Asuh</label>
                                                            <input type="text"
                                                                class="form-control"
                                                                name="NAMA_ORANGTUAASUH" value="{{ $bapakasuh->NAMA_ORANGTUAASUH }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>NIP</label>
                                                            <input type="number"
                                                                class="form-control"
                                                                name="NIP" value="{{ $bapakasuh->NIP }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <input type="text" class="form-control"
                                                                name="ALAMAT" value="{{ $bapakasuh->ALAMAT }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>NO. HP</label>
                                                            <input type="number" class="form-control"
                                                                name="NOHP" value="{{ $bapakasuh->NOHP }}">
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End of create modal bentuk_intervensis --}}
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.selectric.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
