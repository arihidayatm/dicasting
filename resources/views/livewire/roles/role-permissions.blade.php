<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Role and Permissions</h1>
            <div class="section-header-button">
            </div>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('roles.index') }}">Data</a></div>
                <div class="breadcrumb-item">Role and Permissions</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include('components.layouts.alert')
                </div>
            </div>
            {{-- add Role --}}
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Role</h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- form add roles --}}
                            <form wire:submit="storeRole">
                                <div class="form-group">
                                    <label for="name">Role Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" wire:model="name" placeholder="Nama Role">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="guard_name">Guard Name</label>
                                    <input type="text" class="form-control @error('guard_name') is-invalid @enderror"
                                        id="guard_name" name="guard_name" wire:model="guard_name" placeholder="web">
                                    @error('guard_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>List Roles</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-sm table">
                                    <thead class="mb-2">
                                        <tr>
                                            {{-- table of role --}}
                                            <th>Role Name</th>
                                            <th>Guard Name</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->guard_name }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <a href="#"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    <button wire:click="destroyRole({{ $item->id }})"
                                                        class="btn btn-sm btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $roles->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- add permissions --}}
            <livewire:permissions />
        </div>
    </section>
</div>
