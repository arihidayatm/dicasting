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
                                            {{-- <th>Umur</th> --}}
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
                                                <td><a href="{{ route('stuntings.detailData', $stunting->id) }}">{{ Str::mask($stunting->NIK, '*', 4,8) }}</a></td>
                                                <td>{{ Str::mask($stunting->NO_KK, '*', 4,8) }}</td>
                                                <td>{{ $stunting->NAMA_BALITA }}</td>
                                                <td>{{ $stunting->TGL_LAHIR }}</td>
                                                <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                {{-- <td>{{ $stunting->UMUR }} Bulan</td> --}}
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
                                    {{-- <caption>Showing data from {{ $stuntings->firstItem() }} to {{ $stuntings->lastItem() }} of {{ $stuntings->total() }} data.</caption> --}}
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
                                <h4>Data Pengukuran Anak</h4>
                            </div>
                            <div class="card-body">
                                {{-- <a class="btn btn-outline-primary" href="{{ route('stuntings.create')}}" role="button">Tambah Data</a> --}}

                                <div class="row justify-content-end">
                                    <div class="col-4">
                                        <div class="float-right">
                                            <form method="GET" action="{{ route('stuntings.index') }}">
                                                <div class="input-group">
                                                    <select class="form-control" name="bulan" id="bulan" onchange="this.form.submit()">
                                                        <option value="">-- searching berdasarkan Bulan --</option>
                                                        <option value="01">Januari</option>
                                                        <option value="02">Februari</option>
                                                        <option value="03">Maret</option>
                                                        <option value="04">April</option>
                                                        <option value="05">Mei</option>
                                                        <option value="06">Juni</option>
                                                        <option value="07">Juli</option>
                                                        <option value="08">Agustus</option>
                                                        <option value="09">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <form method="GET" action="{{ route('stuntings.pengukuran') }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search by Name" name="nama_balita" value="{{ request()->query('nama_balita') }}">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive" >
                                    <table class="table-striped table">
                                        <tr class="table">
                                            <th>Action</th>
                                            <th>NIK</th>
                                            <th>Nama Balita</th>
                                            <th>Tgl. Pengukuran</th>
                                            <th>Umur</th>
                                            <th>BB Ukur</th>
                                            <th>TB Ukur</th>
                                            <th>Cara Ukur</th>
                                        </tr>
                                        @foreach ($stuntingPengukuran as $dataUkur)
                                            <tr>
                                                <td>
                                                    <!-- Button update modal -->
                                                    <button type="button" class="btn btn-outline-warning float-right" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                        Update
                                                    </button>
                                                    {{-- Update Modal --}}
                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <form action="{{ route('stuntings.update-pengukuran', $stunting) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="card-header">
                                                                        <h4>Update Data Pengukuran</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="TGL_UKUR">Tgl. Pengukuran</label>
                                                                            <input type="date" class="form-control" name="TGL_UKUR" id="TGL_UKUR" value="{{ $stunting->TGL_UKUR }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="BERAT_BADAN">Berat Badan (*dalam kg)</label>
                                                                            <input type="number" class="form-control" name="BERAT_BADAN" id="BERAT_BADAN" value="{{ $stunting->BERAT_BADAN }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="TINGGI_BADAN">Tinggi Badan (*dalam cm)</label>
                                                                            <input type="number" class="form-control" name="TINGGI_BADAN" id="TINGGI_BADAN" value="{{ $stunting->TINGGI_BADAN }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="CARA_UKUR">Cara Ukur</label>
                                                                            <select class="form-control select2" name="CARA_UKUR" id="CARA_UKUR">
                                                                                <option value="Berdiri" {{ $stunting->CARA_UKUR == 'Berdiri' ? 'selected' : '' }}>Berdiri</option>
                                                                                <option value="Terlentang" {{ $stunting->CARA_UKUR == 'Terlentang' ? 'selected' : '' }}>Terlentang</option>
                                                                            </select>
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
                                                <td>{{ Str::mask($dataUkur->stuntings->NIK, '*', 4,8) }}</td>
                                                <td>{{ $dataUkur->stuntings->NAMA_BALITA }}</td>
                                                <td>{{ $dataUkur->TGL_UKUR }}</td>
                                                <td>
                                                    <?php
                                                        $tglLahir = new DateTime($dataUkur->stuntings->TGL_LAHIR);
                                                        $tglUkur = new DateTime($dataUkur->TGL_UKUR);
                                                        $umur = $tglUkur->diff($tglLahir);
                                                    ?>
                                                    {{ $umur->format('%y Tahun %m Bulan %d Hari') }}
                                                </td>
                                                <td>{{ $dataUkur->BB_UKUR }} kg</td>
                                                <td>{{ $dataUkur->TB_UKUR }} cm</td>
                                                <td>{{ $dataUkur->CARA_UKUR }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <caption>Showing data from {{ $stuntingPengukuran->firstItem() }} to {{ $stuntingPengukuran->lastItem() }} of {{ $stuntingPengukuran->total() }} data.</caption>
                                </div>
                                <div class="float-right">
                                    {{ $stuntingPengukuran->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Sumber Data</h4>
                        </div>
                        <div class="card-body">
                            <p>e-PPGBM</p>
                            <ul>
                                <li>Import Data Balita Tahun 2024</li>
                                <li>Import Data Stunting Tahun 2024</li>
                                <li>Import Data Puskesmas Tahun 2024</li>
                                <li>Import Data Posyandu Tahun 2024</li>
                                <li>Peraturan Menteri Kesehatan (Permenkes) No. 2 Tahun 2020 tentang Standar Antropometri Anak</li>
                            </ul>
                        </div>
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
