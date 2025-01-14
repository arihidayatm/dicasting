@extends('layouts.app')

@section('title', 'Stuntings Detail')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css" rel="stylesheet"/>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Data Anak</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('stuntings.index') }}">Detail Data</a></div>
                    <div class="breadcrumb-item">Anak</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="clearfix mb-0"></div>
                {{-- Tab Content --}}
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Anak</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-6">
                                            <table class="table table-sm table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td>No. KTP</td>
                                                        <td>:</td>
                                                        <td>{{ $stunting->NIK }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Anak</td>
                                                        <td>:</td>
                                                        <td>{{ $stunting->NAMA_BALITA }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td>:</td>
                                                        <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Umur</td>
                                                        <td>:</td>
                                                        <td><?php
                                                            $tglLahir = new DateTime($stunting->TGL_LAHIR);
                                                            $today = new DateTime('today');
                                                            $umur = $today->diff($tglLahir);
                                                        ?>
                                                        {{ $umur->format('%y Tahun %m Bulan %d Hari') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>

                                    <div class="clearfix mb-3"></div>

                                    <div class="row justify-content-around">
                                        <div class="col-12">
                                            <div class="col-md-12">
                                                {{-- Tabs Navs --}}
                                                <ul class="nav nav-tabs mb-3" id="myTab-icons" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a data-mdb-tab-init class="nav-link active"
                                                            id="dataBalita-icons-tabs-1" href="#dataBalita-icons-tabs-1" role="tab" aria-controls="dataBalita-icons-tabs-1" aria-selected="true">
                                                            <i class="fas fa-chart-pie fa-fw me-2"></i>Biodata Lengkap</a>
                                                        {{-- <button class="nav-link active" id="balita-tab" data-bs-toggle="tab" data-bs-target="#dataBalita" type="button" role="tab" aria-controls="dataBalita" aria-selected="true">Biodata Lengkap</button> --}}
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a data-mdb-tab-init class="nav-link"
                                                            id="dataPertumbuhan-icons-tab-2" href="#dataPertumbuhan-icons-tabs-2" role="tab" aria-controls="dataPertumbuhan-icons-tabs-2" aria-selected="true">
                                                            <i class="fas fa-chart-line fa-fw me-2"></i>Data Pengukuran Anak</a>
                                                        {{-- <button class="nav-link" id="dataBeratBadan-tab" data-bs-toggle="tab" data-bs-target="#dataBeratBadan" type="button" role="tab" aria-controls="dataBeratBadan" aria-selected="true">Data Berat Badan</button> --}}
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a data-mdb-tab-init class="nav-link"
                                                            id="dataPMT-icons-tab-3" href="#dataPMT-icons-tabs-3" role="tab" aria-controls="dataPMT-icons-tabs-3" aria-selected="true">
                                                            <i class="fas fa-cogs fa-fw me-2"></i>Data PMT</a>
                                                        {{-- <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="true">Contact</button> --}}
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a data-mdb-tab-init class="nav-link"
                                                            id="dataDeterminan-icons-tab-4" href="#dataDeterminan-icons-tabs-4" role="tab" aria-controls="dataDeterminan-icons-tabs-4" aria-selected="true">
                                                            <i class="fas fa-cogs fa-fw me-2"></i>Data Determinan/Tindakan</a>
                                                        {{-- <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="true">Contact</button> --}}
                                                    </li>
                                                </ul>

                                                {{-- Tabs Content --}}
                                                <div class="tab-content" id="myTab-icons-content">
                                                    {{-- Biodata Lengkap --}}
                                                    <div class="tab-pane fade show active" id="dataBalita-icons-tabs-1" role="tabpanel" aria-labelledby="dataBalita-icons-tabs-1">
                                                        <div class="row justify-content-around">
                                                            <div class="col-4">
                                                                <div class="card-header">
                                                                    <h4>Data Anak</h4>
                                                                </div>
                                                                <table class="table-sm table table-info">
                                                                    <tbody class="table table-striped row-md-6">
                                                                        <tr>
                                                                            <th>NIK</th>
                                                                            <td>:</td>
                                                                            <td>{{ Str::mask($stunting->NIK, '*', 4,8) }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Nama Balita</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->NAMA_BALITA }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Tanggal Lahir</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->TGL_LAHIR }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Jenis Kelamin</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->JENIS_KELAMIN }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Umur</th>
                                                                            <td>:</td>
                                                                            <td><?php
                                                                                $tglLahir = new DateTime($stunting->TGL_LAHIR);
                                                                                $today = new DateTime('today');
                                                                                $umur = $today->diff($tglLahir);
                                                                            ?>
                                                                            {{ $umur->format('%y Tahun %m Bulan %d Hari') }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Puskesmas Terdaftar</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->puskesmas->NAMA_PUSKESMAS }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Posyandu</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->POSYANDU }}</td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="card-header">
                                                                    <h4>Data Keluarga</h4>
                                                                </div>
                                                                <table class="table-sm table table-info">
                                                                    <tbody class="table table-striped row-md-6">
                                                                        <tr>
                                                                            <th>No. KK</th>
                                                                            <td>:</td>
                                                                            <td>{{ Str::mask($stunting->NO_KK, '*', 4,8) }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Nama Ayah</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->NAMA_ORANGTUA }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Nama Ibu</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->NAMA_ORANGTUA}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Alamat</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->ALAMAT }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>RT/RW</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->RT}} / {{ $stunting->RW }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Kecamatan</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->kecamatan->NAMA_KECAMATAN }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Kelurahan</th>
                                                                            <td>:</td>
                                                                            <td>{{ $stunting->kelurahandesa->NAMA_KELURAHANDESA}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    {{-- Data Pertumbuhan --}}
                                                    <div class="tab-pane fade" id="dataPertumbuhan-icons-tabs-2" role="tabpanel" aria-labelledby="dataPertumbuhan-icons-tabs-2">
                                                        <div class="row justify-content-around">
                                                            <div class="col-12">
                                                                <div class="card-header">
                                                                    <h4>Data Pertumbuhan Anak</h4>
                                                                </div>
                                                                <table class="table table-bordered">
                                                                    <tbody class="table row-md-6">
                                                                        <tr>
                                                                            <th>Tanggal Ukur</th>
                                                                            <th>Berat Badan Ukur</th>
                                                                            <th>Tinggi Badan Ukur</th>
                                                                            <th>Cara Ukur</th>

                                                                        </tr>
                                                                        @foreach ($riwayatPertumbuhanAnak as $riwayat)
                                                                        <tr>
                                                                            <td>{{ $riwayat->TGL_UKUR }}</td>
                                                                            <td>{{ $riwayat->BB_UKUR }} kg</td>
                                                                            <td>{{ $riwayat->TB_UKUR }} cm</td>
                                                                            <td>{{ $riwayat->CARA_UKUR }}</td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Data PMT --}}
                                                    <div class="tab-pane fade" id="dataPMT-icons-tabs-3" role="tabpanel" aria-labelledby="dataPMT-icons-tab-3">
                                                        <div class="row justify-content-around">
                                                            <div class="col-12">
                                                                <div class="card-header">
                                                                    <h4>Data PMT</h4>
                                                                </div>
                                                                <table class="table table-bordered">
                                                                    <tbody class="table row-md-6">
                                                                        <tr>
                                                                            <th>Pemberian Ke</th>
                                                                            <th>Jenis PMT</th>
                                                                            <th>Tanggal Pemberian</th>
                                                                            <th>Tahun Produksi (Pabrikan)</th>
                                                                            <th>Jumlah Pemberian</th>
                                                                            <th>Alasan Pemberian</th>
                                                                            <th>Sumber Anggaran</th>
                                                                            <th>Mitra</th>
                                                                            <th>Status Gizi Terakhir</th>
                                                                            <th>Hasil Pemberian PMT</th>
                                                                            <th>Tanggal Selesai</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{ $stunting->TGL_UKUR }}</td>
                                                                            <td>{{ $stunting->BB_UKUR }}</td>
                                                                            <td>{{ $stunting->TB_UKUR }}</td>
                                                                            <td>{{ $stunting->CARA_UKUR }}</td>
                                                                            <td>{{ $stunting->TGL_UKUR }}</td>
                                                                            <td>{{ $stunting->BB_UKUR }}</td>
                                                                            <td>{{ $stunting->TB_UKUR }}</td>
                                                                            <td>{{ $stunting->CARA_UKUR }}</td>
                                                                            <td>{{ $stunting->BB_UKUR }}</td>
                                                                            <td>{{ $stunting->TB_UKUR }}</td>
                                                                            <td>{{ $stunting->CARA_UKUR }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Data Determinan --}}
                                                    <div class="tab-pane fade" id="dataDeterminan-icons-tabs-4" role="tabpanel" aria-labelledby="dataDeterminan-icons-tabs-4">
                                                        <div class="row justify-content-around">
                                                            <div class="col-12">
                                                                <div class="card-header">
                                                                    <h4>Data Determinan/Tindakan</h4>
                                                                </div>
                                                                <table class="table table-info table-bordered">
                                                                    <tbody class="table row-md-6">
                                                                        <tr>
                                                                            <th>Tanggal Tindakan</th>
                                                                            <th>Jenis Tindakan</th>
                                                                            <th>JKN/BPJS</th>
                                                                            <th>Air Bersih</th>
                                                                            <th>Tersedia Jamban</th>
                                                                            <th>Imunisasi</th>
                                                                            <th>Merokok</th>
                                                                            <th>Kecacingan</th>
                                                                            <th>Riwayat Kehamilan</th>
                                                                            <th>Penyakit Penyerta</th>
                                                                            <th>Catatan</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{ $stunting->TGL_UKUR }}</td>
                                                                            <td>{{ $stunting->BB_UKUR }}</td>
                                                                            <td>{{ $stunting->TB_UKUR }}</td>
                                                                            <td>{{ $stunting->CARA_UKUR }}</td>
                                                                            <td>{{ $stunting->TGL_UKUR }}</td>
                                                                            <td>{{ $stunting->BB_UKUR }}</td>
                                                                            <td>{{ $stunting->TB_UKUR }}</td>
                                                                            <td>{{ $stunting->CARA_UKUR }}</td>
                                                                            <td>{{ $stunting->BB_UKUR }}</td>
                                                                            <td>{{ $stunting->TB_UKUR }}</td>
                                                                            <td>{{ $stunting->CARA_UKUR }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <a href="{{ route('stuntings.index') }}" class="btn btn-secondary">Back</a>
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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"></script>
@endpush
