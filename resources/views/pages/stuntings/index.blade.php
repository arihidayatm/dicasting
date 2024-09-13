@extends('layouts.app')

@section('title', 'Stuntings')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Management Data Stunting</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('stuntings.index') }}">Management Data</a></div>
                    <div class="breadcrumb-item">Stuntings</div>
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
                                <h4>Data Stunting</h4>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-outline-secondary" href="{{route('stunting.export')}}" role="button">Export</a>
                                <button type="button" class="btn btn-outline-info btn-sm">Copy</button>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('stuntings.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search by Name" name="nama_balita">
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
                                            <th>No.KK</th>
                                            <th>Nama Balita</th>
                                            <th>Tgl. Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur</th>
                                            <th>BB Lahir</th>
                                            <th>TB Lahir</th>
                                            <th>Nama Ibu</th>
                                            <th>Alamat</th>
                                            <th>RT</th>
                                            <th>RW</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            {{-- <th>Posyandu</th> --}}
                                            {{-- <th>Status BB/U</th> --}}
                                            <th>Status TB/U</th>
                                            {{-- <th>Status BB/TB</th> --}}
                                        </tr>
                                        @foreach ($stuntings as $stunting)
                                            <tr>
                                                <td><a href="{{ route('stuntings.detail', $stunting->id) }}">{{ $stunting->NIK }}</a></td>
                                                <td>{{ $stunting->NO_KK }}</td>
                                                <td>{{ $stunting->NAMA_BALITA }}</td>
                                                <td>{{ $stunting->TGL_LAHIR }}</td>
                                                <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                <td>{{ $stunting->UMUR }} Bulan</td>
                                                <td>{{ $stunting->BERAT_BADAN }} kg</td>
                                                <td>{{ $stunting->TINGGI_BADAN }} cm</td>
                                                <td>{{ $stunting->NAMA_ORANGTUA }}</td>
                                                <td>{{ $stunting->ALAMAT }}</td>
                                                <td>{{ $stunting->RT }}</td>
                                                <td>{{ $stunting->RW }}</td>
                                                <td>{{ $stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                <td>{{ $stunting->kelurahandesa->NAMA_KELURAHANDESA }}</td>
                                                {{-- <td>{{ $stunting->posyandu->NAMA_POSYANDU }}</td> --}}
                                                {{-- <td>{{ $stunting->STATUS_BBU }}</td> --}}
                                                <td>{{ $stunting->STATUS_TBU }}</td>
                                                {{-- <td>{{ $stunting->STATUS_BBTB }}</td> --}}
                                            </tr>
                                        @endforeach
                                    </table>
                                    <caption>Showing data from {{ $stuntings->firstItem() }} to {{ $stuntings->lastItem() }} of {{ $stuntings->total() }} data.</caption>
                                </div>
                                <div class="float-right">
                                    {{ $stuntings->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Penambahan Data Stunting</h4>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-outline-primary" href="{{ route('stuntings.create')}}" role="button">Tambah Data</a>

                                <div class="float-right">
                                    <form method="GET" action="{{ route('stuntings.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search by Name" name="nama_balita">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive" >
                                    <table class="table-striped table">
                                        <tr class="table">
                                            <th>Sumber Data</th>
                                            <th>Tanggal Pengukuran</th>
                                            <th>NIK</th>
                                            <th>No.KK</th>
                                            <th>Nama Balita</th>
                                            <th>Tgl. Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Umur</th>
                                            <th>BB Lahir</th>
                                            <th>TB Lahir</th>
                                            <th>Nama Ibu</th>
                                            <th>Alamat</th>
                                            <th>RT</th>
                                            <th>RW</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            {{-- <th>Posyandu</th> --}}
                                            {{-- <th>Status BB/U</th> --}}
                                            <th>Status TB/U</th>
                                            <th>ZS TB/U</th>
                                            {{-- <th>Status BB/TB</th> --}}
                                        </tr>
                                        @foreach ($stuntings as $stunting)
                                            <tr>
                                                <td><!-- Large modal -->
                                                    <button type="button" class="btn btn-outline-warning float-right" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                        Update
                                                    </button>
                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <form action="{{ route('stuntings.update', $stunting) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="card-header">
                                                                        <h4>Update Data</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="NIK">NIK</label>
                                                                            <input type="text" class="form-control" id="NIK" name="NIK" value="{{ $stunting->NIK }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="NO_KK">No KK</label>
                                                                            <input type="text" class="form-control" id="NO_KK" name="NO_KK" value="{{ $stunting->NO_KK }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="NAMA_BALITA">Nama Balita</label>
                                                                            <input type="text" class="form-control" id="NAMA_BALITA" name="NAMA_BALITA" value="{{ $stunting->NAMA_BALITA }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="TGL_LAHIR">Tanggal Lahir</label>
                                                                            <input type="date" class="form-control" id="TGL_LAHIR" name="TGL_LAHIR" value="{{ $stunting->TGL_LAHIR }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="JENIS_KELAMIN">Jenis Kelamin</label>
                                                                            <select class="form-control" id="JENIS_KELAMIN" name="JENIS_KELAMIN" >
                                                                                <option value="L">Laki-laki</option>
                                                                                <option value="P">Perempuan</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="BERAT_BADAN">Berat Badan</label>
                                                                            <input type="number" class="form-control" id="BERAT_BADAN" name="BERAT_BADAN" value="{{ $stunting->BERAT_BADAN }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="TINGGI_BADAN">Tinggi Badan</label>
                                                                            <input type="number" class="form-control" id="TINGGI_BADAN" name="TINGGI_BADAN" value="{{ $stunting->TINGGI_BADAN }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="NAMA_ORANGTUA">Nama Orang Tua</label>
                                                                            <input type="text" class="form-control" id="NAMA_ORANGTUA" name="NAMA_ORANGTUA" value="{{ $stunting->NAMA_ORANGTUA }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="ALAMAT">Alamat</label>
                                                                            <input type="text" class="form-control" id="ALAMAT" name="ALAMAT" value="{{ $stunting->ALAMAT }}">
                                                                        </div>
                                                                        {{-- <div class="form-group">
                                                                            <label for="KECAMATAN_ID">Kecamatan</label>
                                                                            <select class="form-control select2" id="KECAMATAN_ID" name="KECAMATAN_ID">
                                                                                <option disabled value>Pilih Kecamatan</option>
                                                                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->NAMA_KECAMATAN }}</option>

                                                                                @foreach($kecamatans as $kecamatan)
                                                                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->NAMA_KECAMATAN }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="KELURAHANDESA_ID">Kelurahan/Desa</label>
                                                                            <select class="form-control" id="KELURAHANDESA_ID" name="KELURAHANDESA_ID" required>
                                                                                @foreach($kelurahandesas as $kelurahandesa)
                                                                                    <option value="{{ $kelurahandesa->id }}">{{ $kelurahandesa->NAMA_KELURAHANDESA }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div> --}}
                                                                        <div class="form-group">
                                                                            <label for="sumber_data">Sumber Data</label>
                                                                            <input type="text" class="form-control" id="sumber_data" name="sumber_data" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="tgl_pengukuran">Tanggal Pengukuran</label>
                                                                            {{-- <input type="date" class="form-control" id="tgl_pengukuran" name="tgl_pengukuran" required> --}}
                                                                            <input type="date" class="form-control" id="updated_at" name="updated_at" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer text-right">
                                                                        <button class="btn btn-primary">Submit</button>
                                                                        {{-- Cancel button --}}
                                                                        <a href="{{ route('stuntings.index') }}" class="btn btn-secondary">Cancel</a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{-- <td>{{ $stunting->tgl_pengukuran }}</td> --}}
                                                <td>{{ $stunting->updated_at }}</td>
                                                <td>{{ $stunting->NIK }}</td>
                                                <td>{{ $stunting->NO_KK }}</td>
                                                <td>{{ $stunting->NAMA_BALITA }}</td>
                                                <td>{{ $stunting->TGL_LAHIR }}</td>
                                                <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                <td>{{ $stunting->UMUR }} Bulan</td>
                                                <td>{{ $stunting->BERAT_BADAN }} kg</td>
                                                <td>{{ $stunting->TINGGI_BADAN }} cm</td>
                                                <td>{{ $stunting->NAMA_ORANGTUA }}</td>
                                                <td>{{ $stunting->ALAMAT }}</td>
                                                <td>{{ $stunting->RT }}</td>
                                                <td>{{ $stunting->RW }}</td>
                                                <td>{{ $stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                <td>{{ $stunting->kelurahandesa->NAMA_KELURAHANDESA }}</td>
                                                {{-- <td>{{ $stunting->posyandu->NAMA_POSYANDU }}</td> --}}
                                                {{-- <td>{{ $stunting->STATUS_BBU }}</td> --}}
                                                <td>{{ $stunting->STATUS_TBU }}</td>
                                                <td>{{ $stunting->ZS_TBU }}</td>
                                                {{-- <td>{{ $stunting->STATUS_BBTB }}</td> --}}
                                            </tr>
                                        @endforeach
                                    </table>
                                    <caption>Showing data from {{ $stuntings->firstItem() }} to {{ $stuntings->lastItem() }} of {{ $stuntings->total() }} data.</caption>
                                </div>
                                <div class="float-right">
                                    {{ $stuntings->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                <caption>Sumber Rumusan: *Peraturan Menteri Kesehatan (Permenkes) No. 2 Tahun 2020 tentang Standar Antropometri Anak </caption>
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
