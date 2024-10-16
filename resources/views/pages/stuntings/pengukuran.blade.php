@extends('layouts.app')

@section('title', 'Stunting Pengukuran')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Management Data Pengukuran</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('stuntings.index') }}">Management Data</a></div>
                    <div class="breadcrumb-item">Pengukuran</div>
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
                                <h4>Data Pengukuran Anak</h4>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-outline-secondary" href="{{route('stunting.export')}}" role="button">Export</a>
                                <button type="button" class="btn btn-outline-info btn-sm">Copy</button>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('stuntings.index') }}">
                                        <div class="input-group">
                                            <select class="form-control" name="bulan" id="bulan">
                                                <option value="">-- Pilih Bulan --</option>
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
                                                    <!-- Large modal -->
                                                    <button type="button" class="btn btn-outline-warning float-right" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                        Update
                                                    </button>
                                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <form action="{{ route('stuntings.update-pengukuran', $dataUkur) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="card-header">
                                                                        <h4>Update Data Pengukuran</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="TGL_UKUR">Tgl. Pengukuran</label>
                                                                            <input type="date" class="form-control" name="TGL_UKUR" id="TGL_UKUR" value="{{ $dataUkur->TGL_UKUR }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="BERAT_BADAN">Berat Badan</label>
                                                                            <input type="number" class="form-control" name="BERAT_BADAN" id="BERAT_BADAN" value="{{ $dataUkur->BERAT_BADAN }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="TINGGI_BADAN">Tinggi Badan</label>
                                                                            <input type="number" class="form-control" name="TINGGI_BADAN" id="TINGGI_BADAN" value="{{ $dataUkur->TINGGI_BADAN }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="CARA_UKUR">Cara Ukur</label>
                                                                            <select class="form-control select2" name="CARA_UKUR" id="CARA_UKUR">
                                                                                <option value="Berdiri" {{ $dataUkur->CARA_UKUR == 'Berdiri' ? 'selected' : '' }}>Berdiri</option>
                                                                                <option value="Terlentang" {{ $dataUkur->CARA_UKUR == 'Terlentang' ? 'selected' : '' }}>Terlentang</option>
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
                                                <td>{{ substr($dataUkur->stuntings->NIK, 0, 6) }}*****</td>
                                                <td>{{ $dataUkur->stuntings->NAMA_BALITA }}</td>
                                                <td>{{ $dataUkur->TGL_UKUR }}</td>
                                                <td>
                                                    <?php
                                                        $tglLahir = new DateTime($dataUkur->TGL_LAHIR);
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
                                    {{-- <caption>Showing data from {{ $stuntingPengukuran->firstItem() }} to {{ $stuntingPengukuran->lastItem() }} of {{ $stuntingPengukuran->total() }} data.</caption> --}}
                                </div>
                                <div class="float-right">
                                    {{ $stuntingPengukuran->links() }}
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
@endpush
