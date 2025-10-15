<?php

namespace App\Livewire\Admin\Student;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class StudentIndex extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        flash()->option('timeout', 2000)->success('User deleted successfully!');
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.student.student-index', [
            'students' => User::role('student')->with('profile')->latest()->paginate(3),
        ]);
    }
}
