<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class AssignPermissions extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $roles;
    public $permissions = [];

    public function mount()
    {
        $this->roles = \Spatie\Permission\Models\Role::all();
        $this->permissions = \Spatie\Permission\Models\Permission::all();
    }

    // public function assignPermission($permission)
    // {
    //     if (in_array($permission, $this->permissions)) {
    //         $this->permissions = array_diff($this->permissions, [$permission]);
    //     } else {
    //         array_push($this->permissions, $permission);
    //     }
    // }

    // public function updatePermissions()
    // {
    //     $this->role->syncPermissions($this->permissions);
    //     session()->flash('message', 'Permissions updated successfully.');
    // }

    public function render()
    {
        // $assignedPermissions = $this->role->permissions->pluck('name')->toArray();
        return view('livewire.assign-permissions');
    }
}
