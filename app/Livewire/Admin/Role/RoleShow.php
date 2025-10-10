<?php

namespace App\Livewire\Admin\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleShow extends Component
{
    public $roleId;

    public function render()
    {
        return view('livewire.admin.role.role-show', [
            'role' => Role::with('permissions')->findOrFail($this->roleId),
        ]);
    }
}
