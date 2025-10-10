<?php

namespace App\Livewire\Admin\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleEdit extends Component
{
    public $roleId;

    public $name;

    public $selectedPermissions = [];

    public function mount($roleId)
    {
        $this->roleId = $roleId;

        $role = Role::with('permissions')->findOrFail($roleId);
        $this->name = $role->name;

        // Only IDs of existing permissions
        $this->selectedPermissions = $role->permissions->pluck('id')->toArray();
    }

    public function updateRole()
    {
        // Validate input
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'selectedPermissions' => 'array',
            'selectedPermissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::findOrFail($this->roleId);
        $role->name = ucfirst($validated['name']);
        $role->save();

        // Sync only valid permissions
        $validPermissionIds = Permission::whereIn('id', $this->selectedPermissions)->pluck('id')->toArray();
        $role->syncPermissions($validPermissionIds);

        flash()->success("Role '{$this->name}' updated successfully!");

        return redirect()->route('roles.index');
    }

    public function render()
    {
        return view('livewire.admin.role.role-edit', [
            'permissions' => Permission::all(), // fetch all permissions
        ]);
    }
}
