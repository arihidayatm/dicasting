<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Add Permissions</h4>
                <div class="card-header-action">
                </div>
            </div>
            <div class="card-body">
                {{-- form add permissions --}}
                <form wire:submit="storePermission">
                    <div class="form-group">
                        <label for="name">Name Permission</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="name" name="name" wire:model="name" placeholder="Nama Permission">
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
                <h4>List Permissions</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-sm table">
                        <thead class="mb-2">
                            <tr>
                                {{-- table of permissions --}}
                                <th>Permission Name</th>
                                <th>Guard Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->guard_name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="#"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <button wire:click="destroyPermission({{ $item->id }})"
                                            class="btn btn-sm btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
