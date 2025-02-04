<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissions extends Component
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

        Role::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ]);
        $this->reset();
    }

    public function editRole($id)
    {
        $role = Role::find($id);
        $this->name = $role->name;
        $this->guard_name = $role->guard_name;
    }

    public function updateRole($id)
    {
        $this->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'guard_name' => 'required',
        ]);

        $role = Role::find($id);
        $role->update([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ]);
        $this->reset();
    }

    public function destroyRole($id)
    {
        Role::find($id)->delete();
    }

    public function render()
    {
        $roles = Role::paginate(5);
        return view('livewire.roles.role-permissions', compact('roles'));
    }

}
