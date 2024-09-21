@extends('layouts.app')

@section('title', 'Balita')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Balita</h1>
                <!-- Create Balita -->
                <div class="section-header-button">
                    <a href="#" class="btn btn-primary">Add New</a>
                </div>
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createBalitaModal">
                    Create Balita
                </button> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('balita.index') }}">Data Balita</a></div>
                    <div class="breadcrumb-item">Balita</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                {{-- filter select Kecamatan, Kelurahandesa --}}
                {{-- <div class="row">
                    <div class="col-12"></div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="KECAMATAN_ID">Kecamatan</label>
                                    <select name="KECAMATAN_ID" id="KECAMATAN_ID" class="form-control selectric">
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach ($kecamatans as $kecamatan)
                                            <option value="{{ $kecamatan->KECAMATAN_ID }}">{{ $kecamatan->NAMA_KECAMATAN }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="KELURAHANDESA_ID">Kelurahan/Desa</label>
                                    <select name="KELURAHANDESA_ID" id="KELURAHANDESA_ID" class="form-control selectric">
                                        <option value="">Pilih Kelurahan/Desa</option>
                                        @foreach ($kelurahans as $kelurahan)
                                            <option value="{{ $kelurahan->KELURAHANDESA_ID }}">{{ $kelurahan->NAMA_KELURAHANDESA }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Posyandu</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#mycard-collapse"
                                        class="btn btn-icon btn-info"
                                        href="#"><i class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="collapse show"
                                id="mycard-collapse">
                                {{-- You can show or hide this card Data Balita --}}
                                <div class="card-body">
                                    <a class="btn btn-outline-secondary" href="{{ route('balitas.export') }}" role="button">Export</a>
                                    <button type="button" class="btn btn-outline-info btn-sm">Copy</button>

                                    <div class="float-right">
                                        <form method="GET" action="{{ route('balita.index') }}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search by Name" name="NAMA_BALITA">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="clearfix mb-3"></div>

                                    <div class="table-responsive">

                                        <table class="table-striped-sm table">
                                            <tr>
                                                <th>NIK</th>
                                                {{-- <th>No. KK</th> --}}
                                                <th>Nama Balita</th>
                                                <th>Tgl. Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Nama Ayah</th>
                                                <th>Nama Ibu</th>
                                                <th>Alamat</th>
                                                <th>RT RW</th>
                                                {{-- <th>Kab/Kota</th> --}}
                                                <th>Kecamatan</th>
                                                <th>Desa</th>
                                                {{-- <th>Puskesmas</th> --}}
                                            </tr>
                                            @foreach ($balitas as $balita)
                                                <tr>
                                                    <td><a href="{{ route('balitas.detail', $balita->id) }}">{{ $balita->NIK }}</a></td>
                                                    {{-- <td>{{ $balita->keluarga->NO_KK }}</td> --}}
                                                    <td>{{ $balita->NAMA_BALITA }}</td>
                                                    <td>{{ $balita->TGL_LAHIR }}</td>
                                                    <td>{{ $balita->JENIS_KELAMIN }}</td>
                                                    <td>{{ $balita->NAMA_AYAH }}</td>
                                                    <td>{{ $balita->NAMA_IBU }}</td>
                                                    <td>{{ $balita->ALAMAT }}</td>
                                                    <td>{{ $balita->RT }} / {{ $balita->RW }}</td>
                                                    {{-- <td>{{ $balita->kabupatenkota->NAMA_KABKOTA }}</td> --}}
                                                    <td>{{ $balita->kecamatan->NAMA_KECAMATAN }}</td>
                                                    <td>{{ $balita->kelurahandesa->NAMA_KELURAHANDESA }}</td>
                                                    {{-- <td>{{ $balita->puskesmas->NAMA_PUSKESMAS }}</td> --}}
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <caption>Showing data from {{ $balitas->firstItem() }} to {{ $balitas->lastItem() }} of {{ $balitas->total() }} data.</caption>
                                    </div>
                                    <div class="float-right">
                                        {{ $balitas->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Import Data Balita</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('balitas.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="file" aria-label="Upload">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-success btn-sm" type="submit" id="file">Import</button>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card mt-4">
                                            <a href="{{ route('balitas.export') }}" class="btn btn-outline-info btn-sm">Export Data</a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card mt-4">
                                            <a href="#" class="btn btn-outline-info btn-sm">Template</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Import Data Balita</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('balitas.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="file" aria-label="Upload">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-success btn-sm" type="submit" id="file">Import</button>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card mt-4">
                                            <a href="{{ route('balitas.export') }}" class="btn btn-outline-info btn-sm">Export Data</a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card mt-4">
                                            <a href="#" class="btn btn-outline-info btn-sm">Template</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit -->
                {{-- <div class="modal fade" id="editBalitaModal{{ $balita->id }}" tabindex="-1" role="dialog" aria-labelledby="editBalitaModalLabel{{ $balita->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editBalitaModalLabel{{ $balita->id }}">Edit Balita</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('balita.update', $balita->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <!-- Form Edit Balita -->
                                    <div class="form-group"></div>
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $balita->NIK }}">
                                </div>
                                <div class="form-group">
                                        <label for="no_kk">No. KK</label>
                                        <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $balita->NO_KK }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_balita">Nama Balita</label>
                                        <input type="text" class="form-control" id="nama_balita" name="nama_balita" value="{{ $balita->NAMA_BALITA }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="tgl_lahir">Tgl. Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $balita->TGL_LAHIR }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="jns_kelamin">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="jns_kelamin" name="jns_kelamin" value="{{ $balita->JENIS_KELAMIN }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="nama_ibu">Nama Ibu</label>
                                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $balita->NAMA_ORANGTUA }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $balita->ALAMAT }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="rt">RT</label>
                                        <input type="text" class="form-control" id="rt" name="rt" value="{{ $balita->RT }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="rw">RW</label>
                                        <input type="text" class="form-control" id="rw" name="rw" value="{{ $balita->RW }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $balita->kecamatan->NAMA_KECAMATAN }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="puskesmas">Puskesmas</label>
                                        <input type="text" class="form-control" id="puskesmas" name="puskesmas" value="{{ $balita->puskesmas->NAMA_PUSKESMAS }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="desa">Kelurahan/Desa</label>
                                        <input type="text" class="form-control" id="desa" name="desa" value="{{ $balita->kelurahandesa->NAMA_KELURAHANDESA }}">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}

                <!-- Modal Edit -->
                {{-- <div class="modal fade" id="editBalitaModal{{ $balita->id }}" tabindex="-1" role="dialog" aria-labelledby="editBalitaModalLabel{{ $balita->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editBalitaModalLabel{{ $balita->id }}">Edit Balita</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('balita.update', $balita->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <!-- Form Edit Balita -->
                                    <div class="form-group">
                                        <label for="nama_balita">Nama Balita</label>
                                        <input type="text" class="form-control" id="nama_balita" name="nama_balita" value="{{ $balita->NAMA_BALITA }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="tgl_lahir">Tgl. Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $balita->TGL_LAHIR }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="jns_kelamin">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="jns_kelamin" name="jns_kelamin" value="{{ $balita->JENIS_KELAMIN }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="nama_ibu">Nama Ibu</label>
                                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $balita->NAMA_ORANGTUA }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $balita->ALAMAT }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="rt">RT</label>
                                        <input type="text" class="form-control" id="rt" name="rt" value="{{ $balita->RT }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="rw">RW</label>
                                        <input type="text" class="form-control" id="rw" name="rw" value="{{ $balita->RW }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $balita->kecamatan->NAMA_KECAMATAN }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="puskesmas">Puskesmas</label>
                                        <input type="text" class="form-control" id="puskesmas" name="puskesmas" value="{{ $balita->puskesmas->NAMA_PUSKESMAS }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="desa">Desa</label>
                                        <input type="text" class="form-control" id="desa" name="desa" value="{{ $balita->kelurahandesa->NAMA_KELURAHANDESA }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}

                <!-- Modal Delete -->
                <div class="modal fade" id="deleteBalitaModal{{ $balita->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteBalitaModalLabel{{ $balita->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteBalitaModalLabel{{ $balita->id }}">Delete Balita</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('balitas.delete', $balita->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    <!-- Form Delete Balita -->
                                    <p>Anda yakin ingin menghapus balita ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Modal Create --}}
                {{-- <div class="modal fade" id="createBalitaModal" tabindex="-1" role="dialog" aria-labelledby="createBalitaModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createBalitaModalLabel">Create Balita</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('balita.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <!-- Form Create Balita -->
                                    <div class="form-group">
                                        <label for="nama_balita">Nama Balita</label>
                                        <input type="text" class="form-control" id="nama_balita" name="nama_balita">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control" id="nik" name="nik">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_kk">No KK</label>
                                        <input type="text" class="form-control" id="no_kk" name="no_kk">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="rt">RT</label>
                                        <input type="text" class="form-control" id="rt" name="rt" value="{{ $balita->RT }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="rw">RW</label>
                                        <input type="text" class="form-control" id="rw" name="rw" value="{{ $balita->RW }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $balita->kecamatan->NAMA_KECAMATAN }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="puskesmas">Puskesmas</label>
                                        <input type="text" class="form-control" id="puskesmas" name="puskesmas" value="{{ $balita->puskesmas->NAMA_PUSKESMAS }}">
                                    </div>
                                    <div class="form-group"></div>
                                        <label for="desa">Desa</label>
                                        <input type="text" class="form-control" id="desa" name="desa" value="{{ $balita->kelurahandesa->NAMA_KELURAHANDESA }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}

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
