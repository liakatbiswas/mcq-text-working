<?php

namespace App\Livewire\Admin\Subject;

use App\Models\Subject;
use Livewire\Component;

class SubjectIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.subject.subject-index', [
            'subjects' => Subject::latest()->paginate(3),
        ]);
    }
}
