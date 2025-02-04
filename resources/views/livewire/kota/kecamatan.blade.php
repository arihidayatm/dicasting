<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kecamatan</h1>
            <div class="section-header-button">
            </div>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('kecamatan.index') }}">Data</a></div>
                <div class="breadcrumb-item">Kecamatan</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('components.layouts.alert')
                </div>
            </div>

            {{-- list data kecamatan --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Kecamatan</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse"
                                    class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="collapse show"
                            id="mycard-collapse">
                            <div class="card-body">

                                {{-- You can show or hide this card Data kecamatan --}}
                                <a class="btn btn-outline-secondary" href="#" role="button">Export</a>
                                <button type="button" class="btn btn-outline-info"
                                        data-toggle="tooltip"
                                        data-placement="right"
                                        title="Comming Soon.">
                                        Copy
                                </button>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('kecamatan.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search by Name" name="NAMA_KECAMATAN">
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
                                                <th>No</th>
                                                <th>Kode Kecamatan</th>
                                                <th>ID Kecamatan BPS</th>
                                                <th>Nama Kecamatan</th>
                                                <th>created at</th>
                                                {{-- <th>updated at</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kecamatans as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->ID }}</td>
                                                <td>{{ $item->ID_KECAMATAN_BPS }}</td>
                                                <td>{{ $item->NAMA_KECAMATAN }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                {{-- <td>{{ $item->updated_at }}</td> --}}
                                                <td class="text-center">
                                                    <!-- Tombol Edit Data kecamatan -->
                                                    <button wire:click="showEditModal({{ $item->id }})" class="btn btn-sm btn-warning">Edit</button>
                                                    <button wire:click="delete({{ $item->id }})" class="btn btn-sm btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center">
                                    {{ $kecamatans->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
