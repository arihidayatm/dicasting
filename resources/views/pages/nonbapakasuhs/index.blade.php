@extends('layouts.app')

@section('title', 'Non Bapak Ibu Asuh')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Non Bapak Ibu Asuh</h1>
                <div class="section-header-button">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createModal">
                        Add Non Bapak Ibu Asuh
                    </button>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('nonbapakasuhs.index') }}">Non Bapak Ibu Asuh</a></div>
                    <div class="breadcrumb-item">List Non Bapak Ibu Asuh</div>
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
                                <h4>List Non Bapak Ibu Asuh</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('nonbapakasuhs.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Non Bapak Asuh" name="NAMA_NONORANGTUAASUH">
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
                                            <th>Kode</th>
                                            <th>Nama Non Bapak Ibu Asuh</th>
                                            <th>Alamat</th>
                                            <th>No. HP</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($nonbapakasuhs as $nonbapakasuh)
                                            <tr>
                                                <td>{{ $nonbapakasuh->KODE_NONORANGTUAASUH }}</td>
                                                <td>{{ $nonbapakasuh->NAMA_NONORANGTUAASUH }}</td>
                                                <td>{{ $nonbapakasuh->ALAMAT }}</td>
                                                <td>{{ $nonbapakasuh->NOHP }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <button type="button" class="btn btn-sm btn-warning btn-icon"
                                                            data-toggle="modal" data-target="#editModal{{ $nonbapakasuh->id }}">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </button>

                                                        <form action="{{ route('nonbapakasuhs.destroy', $nonbapakasuh->id) }}"
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
                                    {{ $nonbapakasuhs->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                @foreach($nonbapakasuhs as $nonbapakasuh)
                <div class="modal fade" id="editModal{{ $nonbapakasuh->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $nonbapakasuh->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $nonbapakasuh->id }}">Edit Non Bapak Ibu Asuh</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('nonbapakasuhs.update', $nonbapakasuh->id) }}">
                                    @csrf
                                    {{-- @method('PUT') --}}
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <input type="text"
                                            class="form-control @error('KODE_NONORANGTUAASUH') is-invalid @enderror"
                                            name="KODE_NONORANGTUAASUH" value="{{ $nonbapakasuh->KODE_NONORANGTUAASUH }}">
                                        @error('NIK_ORANGTUAASUH')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Non Bapak Asuh</label>
                                        <input type="text"
                                            class="form-control @error('NAMA_NONORANGTUAASUH') is-invalid @enderror"
                                            name="NAMA_NONORANGTUAASUH" value="{{ $nonbapakasuh->NAMA_NONORANGTUAASUH }}">
                                        @error('NAMA_ORANGTUAASUH')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text"
                                            class="form-control @error('ALAMAT') is-invalid @enderror"
                                            name="ALAMAT" value="{{ $nonbapakasuh->ALAMAT }}">
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
                                            name="NOHP" value="{{ $nonbapakasuh->NOHP }}">
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
                                <h5 class="modal-title" id="createModalLabel">Add Non Bapak Ibu Asuh</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('nonbapakasuhs.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <input type="text"
                                            class="form-control"
                                            name="KODE_NONORANGTUAASUH"
                                            value="{{ $nonbapakasuh->KODE_NONORANGTUAASUH }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Non Bapak Asuh</label>
                                        <input type="text"
                                            class="form-control"
                                            name="NAMA_NONORANGTUAASUH"
                                            value="{{ $nonbapakasuh->NAMA_NONORANGTUAASUH }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control"
                                            name="ALAMAT"
                                            value="{{ $nonbapakasuh->ALAMAT }}">
                                    </div>
                                    <div class="form-group">
                                        <label>NO. HP</label>
                                        <input type="number" class="form-control"
                                            name="NOHP"
                                            value="{{ $nonbapakasuh->NOHP }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End of create Non Bapak Asuh --}}
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
