<?php

namespace App\Livewire\Admin\Role;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
    use WithPagination;

    protected $listeners = ['roleAdded' => '$refresh'];

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        flash()->option('timeout', 2000)->success('Role deleted successfully!');
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.role.role-index', [
            'roles' => Role::with('permissions')->latest()->paginate(3),
        ]);
    }
}
