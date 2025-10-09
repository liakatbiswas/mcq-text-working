<?php

namespace App\Livewire\Admin\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionEdit extends Component
{
    public $permissionId;

    public $name;

    public function mount($permissionId)
    {
        $this->permissionId = $permissionId;
        $permission = Permission::findOrFail($permissionId);
        $this->name = $permission->name;
    }

    public function updatePermission()
    {

        $validated = $this->validate([
            'name' => 'required|string',
        ]);

        $permission = Permission::findOrFail($this->permissionId);
        $permission->update($validated);

        flash()->option('timeout', 2000)->success('Permission updated successfully!');

        return redirect()->route('permissions.index'); // redirect back to list
    }

    public function render()
    {
        return view('livewire.admin.permission.permission-edit');
    }
}
