<?php

namespace App\Livewire\Admin\Permission;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionCreate extends Component
{
    public $name;

    public function savePermission()
    {

        $validated = $this->validate([
            'name' => 'required|string',
        ]);

        $permission = Permission::firstOrCreate(
            [
                'name' => $validated['name'],
                'guard_name' => 'web',
            ]
        );

        if ($permission->wasRecentlyCreated) {
            flash()->option('timeout', 2000)->success('Permission created successfully!');
        } else {
            flash()->option('timeout', 2000)->warning("Permission '{$validated['name']}' already exists!");
        }

        $this->reset('name');
        $this->dispatch('permissionAdded');

        return redirect()->route('permissions.index');
    }

    public function render()
    {
        return view('livewire.admin.permission.permission-create');
    }
}
