<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $guard_name;

    public function mount()
    {
        // dd($roles);
    }

    //Role
    public function storeRole()
    {
        // dump('ok');
        $this->validate([
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required',
        ]);

        Permission::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ]);
        $this->reset();
    }

    //Permission
    public function storePermission()
    {
        $this->validate([
            'name' => 'required|unique:permissions,name',
            'guard_name' => 'required',
        ]);

        Permission::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ]);
        $this->reset();
    }

    public function editPermission($id)
    {
        $permission = Permission::find($id);
        $this->name = $permission->name;
        $this->guard_name = $permission->guard_name;
    }

    public function updatePermission($id)
    {
        $this->validate([
            'name' => 'required|unique:permissions,name,' . $id,
            'guard_name' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->update([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ]);
        $this->reset();
    }

    public function destroyPermission($id)
    {
        Permission::find($id)->delete();
    }

    public function render()
    {
        $permissions = Permission::paginate(4);
        return view('livewire.permissions', compact('permissions'));
    }
}
