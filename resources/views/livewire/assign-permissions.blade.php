<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Assign Permissions</h1>
            <div class="section-header-button">
            </div>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('assign-permissions') }}">Data</a></div>
                <div class="breadcrumb-item">Assign Permissions</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('components.layouts.alert')
                </div>
            </div>
            {{-- Assign Permission --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Select Role</h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- form Assign Permissions --}}
                            <form wire:submit.prevent="storePermission">
                                <div class="form-group col-md-4">
                                    <label for="role_id">Role</label>
                                    <select class="form-control @error('role_id') is-invalid @enderror" id="role_id"
                                        name="role_id" wire:model="role_id">
                                        <option value="">-- Select Role --</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <label for="guard_name">Guard Name</label>
                                    <input type="text" class="form-control @error('guard_name') is-invalid @enderror"
                                        id="guard_name" name="guard_name" wire:model="guard_name" placeholder="web">
                                    @error('guard_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="">Select All</label>
                                    <div class="form-check">
                                        <input class="form-check" type="checkbox" wire:model="selectAll">
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- List Permissions dengan pilihan checkbox dan nama permissions --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Select Permissions</h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="section-body">
                                <h3>Keluarga</h3>
                                <p>
                                    <span>App\Models\Keluarga</span>
                                </p>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input class="form-check" type="checkbox" wire:model="permissions"
                                                        value="{{ $permission->id }}">
                                                    <label class="form-check">{{ $permission->name }}</label>
                                                </div>
                                            </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            {{-- cancel --}}
            <a href="{{ route('assign-permissions') }}" class="btn btn-danger">Cancel</a>
        </div>
    </section>
</div>

