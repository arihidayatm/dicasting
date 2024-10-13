@extends('layouts.app')

@section('title', 'Form Add Intervensi BASUH')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Add Intervensi Basuh</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('intervensi-nonbpas.index') }}">Forms</a></div>
                    <div class="breadcrumb-item">Add Intervensi</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form method="POST" action="{{ route('intervensi-nonbpas.store') }}">
                        @csrf
                        <div class="card-header">
                            <h4>Penambahan Intervensi Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Penginput</label>
                                        <select name="USER_ID" class="form-control">
                                            <option value="">-- Pilih Nama Penginput --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Balita</label>
                                        <select name="STUNTING_ID" class="form-control">
                                            <option value="">-- Pilih Nama Balita --</option>
                                            @foreach ($stuntings as $stunting)
                                                <option value="{{ $stunting->id }}">{{ $stunting->NAMA_BALITA }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bentuk Intervensi</label>
                                        <select name="BENTUK_INTERVENSI_ID" class="form-control">
                                            <option value="">-- Pilih Bentuk Intervensi --</option>
                                            @foreach ($bentukIntervensis as $bentukIntervensi)
                                                <option value="{{ $bentukIntervensi->id }}">{{ $bentukIntervensi->BENTUK_INTERVENSI }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="STATUS" class="form-control">
                                            <option value="">-- Pilih Status --</option>
                                            <option value="Proses">Proses</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('intervensi-nonbpas.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
