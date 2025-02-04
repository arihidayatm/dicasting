<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Data Balita</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('balita.index') }}">Detail Data</a></div>
                <div class="breadcrumb-item">Balita</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('components.layouts.alert')
                </div>
            </div>

            <div class="clearfix mb-3"></div>
            {{-- Tab Content --}}
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4><i class="fa fa-child"></i> {{ $balita->NAMA_BALITA }} -
                                        @if($balita->JENIS_KELAMIN == 'L')
                                            <i class="fa fa-mars" style="color: rgb(116, 141, 252);"></i>
                                        @else
                                            <i class="fa fa-venus" style="color: rgb(255, 171, 185);"></i>
                                        @endif
                                    </h4>
                                </div>

                                <div class="row justify-content-around">
                                    <div class="col-4">
                                        <div class="col-12 header mt-4">
                                            <h5>Informasi Detail Balita</h5>
                                            <table class="table-striped table">
                                                <tbody class="table row-md-6">
                                                    <tr>
                                                        <th>NIK</th>
                                                        <td>{{ $balita->NIK }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Balita</th>
                                                        <td>{{ $balita->NAMA_BALITA }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tanggal Lahir</th>
                                                        <td>{{ $balita->TGL_LAHIR }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Jenis Kelamin</th>
                                                        <td>{{ $balita->JENIS_KELAMIN }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Ayah</th>
                                                        <td>{{ $balita->NAMA_AYAH }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Ibu</th>
                                                        <td>{{ $balita->NAMA_IBU}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="col-12 header mt-4">
                                            <h5>Informasi Detail Keluarga</h5>
                                            <table class="table-striped table">
                                                <tbody class="table row-md-6">
                                                    <tr>
                                                        <th>No. KK</th>
                                                        <td>{{ $balita->KELUARGA_ID }}</td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <th>Kota</th>
                                                        <td>{{ $balita->kabupatenkota->NAMA_KABKOTA }}</td>
                                                    </tr> --}}
                                                    <tr>
                                                        <th>Alamat</th>
                                                        <td>{{ $balita->ALAMAT }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>RT / RW</th>
                                                        <td>{{ $balita->RT }} /{{ $balita->RW }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Kecamatan</th>
                                                        {{-- <td>{{ $balita->kecamatan->NAMA_KECAMATAN }}</td> --}}
                                                        <td>{{ $balita->KECAMATAN }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Puskesmas Terdaftar</th>
                                                        {{-- <td>{{ $balita->kecamatan->NAMA_KECAMATAN }}</td> --}}
                                                        <td>{{ $balita->PUSKESMAS }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Desa</th>
                                                        {{-- <td>{{ $balita->kelurahandesa->NAMA_KELURAHANDESA }}</td> --}}
                                                        <td>{{ $balita->KELURAHANDESA }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Posyandu</th>
                                                        {{-- <td>{{ $balita->kelurahandesa->NAMA_KELURAHANDESA }}</td> --}}
                                                        <td>{{ $balita->POSYANDU }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    {{-- Balita Edit modal button --}}
                                    <a href="{{ route('balitas.edit', $balita->id) }}"
                                        class="btn btn-primary">
                                        {{-- wire:click="edit({{ $balita->id }})"
                                        wire:loading.attr="disabled"
                                        wire:target="edit({{ $balita->id }})"> --}}
                                        Edit
                                    </a>
                                    <a href="{{ route('balita.index') }}"
                                        class="btn btn-secondary">
                                        Back
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
