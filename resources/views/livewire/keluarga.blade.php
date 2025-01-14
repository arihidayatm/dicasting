@extends('components.layouts.app')

@section('title', 'Keluarga')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/prismjs/themes/prism.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Keluarga</h1>
                <div class="section-header-button">
                </div>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('keluargas.index') }}">Data</a></div>
                    <div class="breadcrumb-item">Keluarga</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('components.layouts.alert')
                    </div>
                </div>
                {{-- add data keluarga --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Data Keluarga</h4>
                                <div class="card-header-action">
                                    {{-- You can show or hide this card add Data Keluarga --}}
                                    <a data-collapse="#mycard-collapse"
                                        class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse show"
                                id="mycard-collapse">
                                <div class="card-body">
                                    {{-- form add keluarga --}}
                                    <form wire:submit.prevent="store">
                                        @csrf
                                        <div class="form-group">
                                            <label for="NO_KK">NO KK</label>
                                            <input type="text" class="form-control @error('NO_KK') is-invalid @enderror" id="NO_KK" name="NO_KK" wire:model="NO_KK" placeholder="NO KK">
                                            @error('NO_KK')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="NIK_AYAH">NIK Ayah</label>
                                                <input type="text" class="form-control @error('NIK_AYAH') is-invalid @enderror" id="NIK_AYAH" name="NIK_AYAH" wire:model="NIK_AYAH" placeholder="NIK Ayah">
                                                @error('NIK_AYAH')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="NAMA_AYAH">Nama Ayah</label>
                                                <input type="text" class="form-control @error('NAMA_AYAH') is-invalid @enderror" id="NAMA_AYAH" name="NAMA_AYAH" wire:model="NAMA_AYAH" placeholder="Nama Ayah">
                                                @error('NAMA_AYAH')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="NIK_IBU">NIK Ibu</label>
                                                <input type="text" class="form-control @error('NIK_IBU') is-invalid @enderror" id="NIK_IBU" name="NIK_IBU" wire:model="NIK_IBU" placeholder="NIK Ibu">
                                                @error('NIK_IBU')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="NAMA_IBU">Nama Ibu</label>
                                                <input type="text" class="form-control @error('NAMA_IBU') is-invalid @enderror" id="NAMA_IBU" name="NAMA_IBU" wire:model="NAMA_IBU" placeholder="Nama Ibu">
                                                @error('NAMA_IBU')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ALAMAT">Alamat</label>
                                            <input type="text" class="form-control @error('ALAMAT') is-invalid @enderror" id="ALAMAT" name="ALAMAT" wire:model="ALAMAT" placeholder="Alamat">
                                            @error('ALAMAT')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- RT RW --}}
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="RT">RT</label>
                                                <input type="text" class="form-control @error('RT') is-invalid @enderror" id="RT" name="RT" wire:model="RT" placeholder="RT">
                                                @error('RT')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="RW">RW</label>
                                                <input type="text" class="form-control @error('RW') is-invalid @enderror" id="RW" name="RW" wire:model="RW" placeholder="RW">
                                                @error('RW')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        {{-- Kabupaten/Kota, Kecamatan, kelurahan/desa  dengan pilihan sesuai dengan table di database KABUPATEN_ID, KECAMATAN_ID, KELURAHANDESA_ID --}}
                                            {{-- <div class="form-group col-md-3">
                                                <label for="KABUPATEN_ID">Kabupaten/Kota</label>
                                                <select class="form-control selectric @error('KABUPATEN_ID') is-invalid @enderror" id="KABUPATEN_ID" name="KABUPATEN_ID" wire:model="KABUPATEN_ID">
                                                    <option value="">-- Pilih Kabupaten/Kota --</option>
                                                    @foreach($kabupatenkotas as $kabupatenkota)
                                                        <option value="{{ $kabupatenkota->id }}">{{ $kabupatenkota->NAMA_KABUPATEN }}</option>
                                                    @endforeach
                                                </select>
                                                @error('KABUPATEN_ID')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                                            <div class="form-group col-md-4">
                                                <label for="KECAMATAN_ID">Kecamatan</label>
                                                <select class="form-control selectric @error('KECAMATAN_ID') is-invalid @enderror" id="KECAMATAN_ID" name="KECAMATAN_ID" wire:model="KECAMATAN_ID">
                                                    <option value="">-- Pilih Kecamatan --</option>
                                                    @foreach($kecamatans as $kecamatan)
                                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->NAMA_KECAMATAN }}</option>
                                                    @endforeach
                                                </select>
                                                @error('KECAMATAN_ID')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="KELURAHANDESA_ID">Kelurahan/Desa</label>
                                                <select class="form-control selectric @error('KELURAHANDESA_ID') is-invalid @enderror" id="KELURAHANDESA_ID" name="KELURAHANDESA_ID" wire:model="KELURAHANDESA_ID">
                                                    <option value="">-- Pilih Kelurahan/Desa --</option>
                                                    @foreach($kelurahandesas as $kelurahandesa)
                                                        <option value="{{ $kelurahandesa->id }}">{{ $kelurahandesa->NAMA_KELURAHANDESA }}</option>
                                                    @endforeach
                                                </select>
                                                @error('KELURAHANDESA_ID')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="KODE_POS">Kode Pos</label>
                                                <input type="text" class="form-control @error('KODE_POS') is-invalid @enderror" id="KODE_POS" name="KODE_POS" wire:model="KODE_POS" placeholder="Kode Pos">
                                                @error('KODE_POS')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="NOHP">No. HP</label>
                                                <input type="text" class="form-control @error('NOHP') is-invalid @enderror" id="NOHP" name="NOHP" wire:model="NOHP" placeholder="No. HP">
                                                @error('NOHP')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- list data keluarga --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Keluarga</h4>
                                <div class="card-header-action">
                                    <a data-collapse="#mycard1-collapse"
                                        class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse show"
                                id="mycard1-collapse">
                                <div class="card-body">

                                    {{-- You can show or hide this card Data Keluarga --}}
                                    <a class="btn btn-outline-secondary" href="#" role="button">Export</a>
                                    <button type="button" class="btn btn-outline-info"
                                            data-toggle="tooltip"
                                            data-placement="right"
                                            title="Comming Soon.">
                                            Copy
                                    </button>
                                    <div class="float-right">
                                        <form method="GET" action="{{ route('keluargas.index') }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search by Name" name="NAMA_KELUARGA">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="clearfix mb-3"></div>

                                    <div class="table-responsive">
                                        <table class="table-sm table">
                                            <thead class="mb-2">
                                                <tr>
                                                    <th>#</th>
                                                    <th>NO KK</th>
                                                    <th>Data AYAH</th>
                                                    {{-- <th>Nama Ayah</th> --}}
                                                    <th>Data IBU</th>
                                                    {{-- <th>Nama Ibu</th> --}}
                                                    <th>Alamat</th>
                                                    <th>Kecamatan</th>
                                                    <th>Kelurahan/Desa</th>
                                                    <th>No. HP</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($keluargas as $keluarga => $item)
                                                <tr>
                                                    <td>{{ $keluarga + $keluargas->firstItem() }}</td>
                                                    <td>{{ Str::mask($item->NO_KK, '*', 4,8) }}</td>
                                                    <td>{{ Str::mask($item->NIK_AYAH, '*', 4,8) }} <br>
                                                    {{ $item->NAMA_AYAH }}</td>
                                                    <td>{{ Str::mask($item->NIK_IBU, '*', 4,8) }} <br>
                                                    {{ $item->NAMA_IBU }}</td>
                                                    <td>{{ $item->ALAMAT }} <br>
                                                    {{  $item->RT }} / {{ $item->RW }}</td>
                                                    {{-- Nama Kecamatan sesuai dengan relasi dari Kecamatan_id --}}
                                                    <td>{{ $item->kecamatan->NAMA_KECAMATAN }}</td>
                                                    <td>{{ $item->kelurahandesa->NAMA_KELURAHANDESA }}
                                                        <br>
                                                        {{ $item->KODE_POS}}
                                                    </td>
                                                    <td>{{ $item->NOHP }}</td>
                                                    <td class="text-center">
                                                        <!-- Tombol Edit Data Keluarga -->
                                                        <button wire:click="showEditModal({{ $item->id }})" class="btn btn-sm btn-warning">Edit</button>
                                                        <button wire:click="delete({{ $item->id }})" class="btn btn-sm btn-danger">Delete</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        {{ $keluargas->links() }}
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

        @if (session()->has('success'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '{{ session('success') }}',
                    })
                });
            </script>
        @endif

        @if (session()->has('error'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: '{{ session('error') }}',
                    })
                });
            </script>
        @endif

        @if (session()->has('warning'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: '{{ session('warning') }}',
                    })
                });
            </script>
        @endif

        @if (session()->has('info'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'info',
                        title: 'Info',
                        text: '{{ session('info') }}',
                    })
                });
            </script>
        @endif

        @if (session()->has('question'))
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'question',
                        title: 'Question',
                        text: '{{ session('question') }}',
                    })
                });
            </script>
        @endif

    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>

@endpush
