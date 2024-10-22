@extends('layouts.app')

@section('title', 'Buku Stunting')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-body">
        </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Laporan Buku Stunting</h2>
                            <div class="card-header-action ml-auto">
                                <a href="{{ route('laporan.bukuStunting') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                            </div>

                        </div>
                        <div class="card-body border-spacing-1 line-height-1">
                            {{-- Cover --}}
                            <div class="row border-line">
                                <div class="col-sm d-flex justify-content-center">
                                    <img src="{{ asset('img/Logo-Sawahlunto.png') }}" class="img-fluid" width="125" alt="logo pemko sawahlunto">
                                </div>
                                <div class="col-sm">
                                    <h3 class="text-center">LAPORAN BUKU STUNTING</h3>
                                    <h4 class="text-center">KOTA SAWAHLUNTO</h4>
                                    <h5 class="text-center">TAHUN {{ date('Y') }}</h5>
                                </div>
                                <div class="col-sm d-flex justify-content-center">
                                    <img src="{{ asset('img/dicasting.png') }}" class="img-fluid" width="150" alt="logo dicasting"> 
                                </div>
                            </div>
                            {{-- Nama Anak --}}
                            <div class="row mt-5">
                                <div class="col-sm">
                                    @foreach($dataStunting as $stuntingItem)
                                        <div class="card-header text-center">
                                            <h3><i class="fa fa-child"></i> {{ $stuntingItem->NAMA_BALITA }} -
                                                @if($stuntingItem->JENIS_KELAMIN == 'L')
                                                    <i class="fa fa-mars" style="color: rgb(116, 141, 252);"></i>
                                                @else
                                                    <i class="fa fa-venus" style="color: rgb(255, 171, 185);"></i>
                                                @endif
                                            </h3>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- Detail Balita --}}
                            <div class="row mt-3">
                                <div class="col-sm">
                                    <table class="table table-sm">
                                        <tbody class="table table-sm">
                                            <tr>
                                                <th>NIK</th>
                                                <td>:</td>
                                                <td>{{ Str::mask($stuntingItem->NIK, '*', 4,8) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td>:</td>
                                                <td>{{ $stuntingItem->TGL_LAHIR }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>:</td>
                                                <td>{{ $stuntingItem->JENIS_KELAMIN }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Orangtua</th>
                                                <td>:</td>
                                                <td>{{ $stuntingItem->NAMA_ORANGTUA }}</td>
                                            </tr>
                                            <tr>
                                                <th>Umur</th>
                                                <td>:</td>
                                                <td>
                                                    <?php
                                                        $tglLahir = new DateTime($stuntingItem->TGL_LAHIR);
                                                        $today = new DateTime('today');
                                                        $umur = $today->diff($tglLahir);
                                                    ?>
                                                    {{ $umur->format('%y Tahun %m Bulan %d Hari') }}
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm">
                                    <table class="table table-sm">
                                        <tbody class="table table-sm">
                                            <tr>
                                                <th>Berat Badan Lahir</th>
                                                <td>:</td>
                                                <td>{{ $stuntingItem->BERAT_BADAN }} kg</td>
                                            </tr>
                                            <tr>
                                                <th>Tinggi Badan Lahir</th>
                                                <td>:</td>
                                                <td>{{ $stuntingItem->TINGGI_BADAN }} cm</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>:</td>
                                                <td>{{ $stuntingItem->ALAMAT }}</td>
                                            </tr>
                                            <tr>
                                                <th>Puskesmas</th>
                                                <td>:</td>
                                                <td>{{ $stuntingItem->puskesmas->NAMA_PUSKESMAS }}</td>
                                            </tr>
                                            <tr>
                                                <th>Posyandu</th>
                                                <td>:</td>
                                                <td>{{ $stuntingItem->POSYANDU }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm">
                                    <div class="card-header">Hai, saya {{ $stuntingItem->NAMA_BALITA }}</div>
                                    <figure class="figure">
                                        <img src="{{ asset('storage/foto_anak/'. $stuntingItem->FOTO_ANAK) }}"
                                        width="200"
                                        class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                                    </figure>
                                </div>
                            </div>
                            {{-- Riwayat Pertumbuhan --}}
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h5>Riwayat Pertumbuhan Anak</h5>
                                    @foreach ($riwayatPertumbuhanAnak as $riwayat)
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered">
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Pengukuran</th>
                                                <th>Berat Badan</th>
                                                <th>Tinggi Badan</th>
                                                <th>Cara Ukur</th>
                                            </tr>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $riwayat->TGL_UKUR }}</td>
                                                <td>{{ $riwayat->BB_UKUR }} kg</td>
                                                <td>{{ $riwayat->TB_UKUR }} cm</td>
                                                <td>{{ $riwayat->CARA_UKUR }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Isian Detail Intervensi --}}
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h5>Detail Intervensi</h5>
                                    @foreach ($detailIntervensis as $item)
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <tr>
                                                <th>No</th>
                                                <th>Bentuk Intervensi</th>
                                                <th>Tanggal Intervensi</th>
                                                <th>Dokumentasi</th>
                                                <th>Keterangan</th>
                                            </tr>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->bentukintervensi->BENTUK_INTERVENSI }}</td>
                                                <td>{{ $item->TGL_INTERVENSI }}</td>
                                                <td>{{ $item->DOKUMENTASI }}</td>
                                                <td>{{ $item->KETERANGAN }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    @endforeach
                                    {{-- @foreach ($detailIntervensis as $item)
                                        <ul class="list-unstyled">
                                            <li class="media">
                                                <img class="mr-3" src="{{ asset('storage/dokumentasi/'. $item->detailIntervensi->DOKUMENTASI) }}" width="50%" alt="dokumentasi intervensi oleh basuh">
                                                <div class="media-body">
                                                    <h6 class="mt-0 mb-1">{{ $item->bentukintervensi->BENTUK_INTERVENSI }}</h6>
                                                    <div class="float-right">
                                                        {{ $item->TGL_INTERVENSI }}
                                                    </div>
                                                    {{ $item->KETERANGAN }}
                                                </div>
                                            </li>
                                        </ul>
                                    @endforeach --}}
                                </div>
                            </div>

                            {{-- isian Tanda tangan --}}
                            <div class="row mt-4">
                                <div class="col-sm">

                                </div>
                                <div class="col-sm">

                                </div>
                                <div class="col-sm">
                                    <br>
                                    Bapak Asuh
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    Nama Bapak Asuh
                                </div>
                                <div class="col-sm">
                                Sawahlunto, {{ \Carbon\Carbon::now('Asia/Jakarta')->isoFormat('D MMMM YYYY') }} <br>
                                Ketua Tim
                                <br>
                                <br>
                                <br>
                                <br>
                                IRZAM K
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
{{-- <script src="{{ asset('js/html2pdf.bundle.min.js') }}"></script> --}}
<script>
    // $(document).ready(function(){
    //     $('#download-laporan').click(function(){
    //         var element = document.getElementById('laporan');
    //         var opt = {
    //             margin:       1,
    //             filename:     'laporan_stunting.pdf',
    //             image:        { type: 'jpeg', quality: 0.98 },
    //             html2canvas:  { scale: 2 },
    //             jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    //         };

    //         html2pdf().from(element).set(opt).save();
    //     });
    // });
</script>
@endpush
