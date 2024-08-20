@extends('layouts.app')

@section('title', 'Intervensi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Tambahkan ini -->
@endpush


@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Master Data Intervensi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('intervensi.index') }}">Intervensi</a></div>
                    <div class="breadcrumb-item">List Intervensi</div>
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
                                <h4>Jenis Intervensi</h4>
                                <div class="row">
                                    <div class="float-left col-3"></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="float-left col-6">
                                    <form method="GET" action="{{ route('intervensi.index') }}">
                                        <div class="form-group">
                                            <select class="form-control" id="jenis_intervensi" name="jenis_intervensi" onchange="this.form.submit()">
                                                <option value="">-- Pilih Jenis Intervensi --</option>
                                                @foreach($jenisIntervensis as $jenisIntervensi)
                                                    <option value="{{ $jenisIntervensi->id }}" {{ request('jenis_intervensi') == $jenisIntervensi->id ? 'selected' : '' }}>
                                                        {{ $jenisIntervensi->JENIS_INTERVENSI }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="float-right col-6">
                                    <a href="{{ route('intervensis.createJenisIntervensi') }}" class="btn btn-primary float-left">Create</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        @if(request('jenis_intervensi'))
                        <div class="card">
                            <div class="card-header">
                                <h4>List Bentuk Intervensi</h4> <hr>
                                <div class="float-left col-3">
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#createModal">
                                        Create
                                    </button>
                                </div>
                                <div class="float-left col-3">
                                    <form action="{{ route('intervensi.index') }}" method="GET">
                                        <div class="input-group float-right">
                                            <input type="text" class="form-control" placeholder="Search by Bentuk Intervensi" name="bentuk_intervensi">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Bentuk Intervensi</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach($bentukIntervensis as $bentukIntervensi)
                                        <tr>
                                            <td>{{ $bentukIntervensi->BENTUK_INTERVENSI }}</td>
                                            <td>{{ $bentukIntervensi->KETERANGAN }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#showModal{{ $bentukIntervensi->id }}">
                                                    Show
                                                </button>
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal{{ $bentukIntervensi->id }}">
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center">
                                    {{ $bentukIntervensis->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="card">
                            <div class="card-header">
                                <h4>List Bentuk Intervensi</h4> <hr>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Bentuk Intervensi</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center">Silakan pilih jenis intervensi terlebih dahulu.</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Edit Modal -->
                    @foreach($bentukIntervensis as $bentukIntervensi)
                    <div class="modal fade" id="editModal{{ $bentukIntervensi->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $bentukIntervensi->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $bentukIntervensi->id }}">Edit Bentuk Intervensi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('bentuk_intervensi.update', $bentukIntervensi->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="bentuk_intervensi">Bentuk Intervensi</label>
                                            <input type="text" class="form-control" id="bentuk_intervensi" name="bentuk_intervensi" value="{{ $bentukIntervensi->BENTUK_INTERVENSI }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="bentuk_intervensi">Deskripsi</label>
                                            <input type="text" class="form-control" id="bentuk_intervensi" name="bentuk_intervensi" value="{{ $bentukIntervensi->BENTUK_INTERVENSI }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                                    <h5 class="modal-title" id="createModalLabel">Create Bentuk Intervensi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('bentuk_intervensi.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="bentuk_intervensi">Bentuk Intervensi</label>
                                            <input type="text" class="form-control" id="bentuk_intervensi" name="bentuk_intervensi">
                                        </div>
                                        <div class="form-group">
                                            <label for="bentuk_intervensi">Deskripsi</label>
                                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End of create modal bentuk_intervensis --}}
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
