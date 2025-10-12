<?php

namespace App\Livewire\Admin\AssignSubject;

use App\Models\AssignSubject;
use Livewire\Component;

class AssignSubjectIndex extends Component
{
    public $assignSubjects;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->assignSubjects = AssignSubject::with(['schoolClass', 'subject'])
            ->orderBy('school_class_id', 'asc')->get();
    }

    public function delete($id)
    {
        AssignSubject::findOrFail($id)->delete();
        $this->loadData();
        flash()->success('Deleted successfully.');
    }

    public function render()
    {
        return view('livewire.admin.assign-subject.assign-subject-index');
    }
}
