<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);
        return view('livewire.role-permissions', compact('roles'));
    }

    public function createRole()
    {
        return view('livewire.roles.create');
    }

    public function storeRole(Request $request)
    {
        dd('ok');
        $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully.');
    }

    public function editRole($id)
    {
        $role = Role::find($id);
        return view('livewire.roles.edit', compact('role'));
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
        ]);

        $role = Role::find($id);
        $role->update($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }

    public function deleteRole($id)
    {
        Role::find($id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }

}
