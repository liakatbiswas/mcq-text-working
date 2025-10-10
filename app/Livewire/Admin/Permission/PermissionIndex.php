<?php

namespace App\Livewire\Admin\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionIndex extends Component
{
    use WithPagination;

    protected $listeners = ['permissionAdded' => '$refresh'];

    public function delete($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        flash()->option('timeout', 2000)->success('Permission deleted successfully!');
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.permission.permission-index', [
            'permissions' => Permission::latest()->paginate(4),
        ]);
    }
}
