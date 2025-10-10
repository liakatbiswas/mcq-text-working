<?php

namespace App\Livewire\Admin\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreate extends Component
{
    public $name;

    public $selectedPermissions = [];

    protected $rules = [
        'name' => 'required|min:3|unique:roles,name',
        'selectedPermissions' => 'array|min:1',
    ];

    public function save()
    {
        $this->validate();

        $role = Role::create(['name' => ucfirst($this->name)]);

        $role->syncPermissions($this->selectedPermissions);

        $this->reset();

        flash()->option('timeout', 2000)->success('Role created successfully!');

        redirect()->route('roles.index');
    }

    public function render()
    {
        return view('livewire.admin.role.role-create', [
            'permissions' => Permission::all(),
        ]);
    }
}
