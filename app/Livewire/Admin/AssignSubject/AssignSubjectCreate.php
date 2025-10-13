<?php

namespace App\Livewire\Admin\AssignSubject;

use App\Models\AssignSubject;
use App\Models\SchoolClass;
use App\Models\Subject;
use Livewire\Component;

class AssignSubjectCreate extends Component
{
    public $school_class_id;

    public $selectedSubjects = [];

    public $classes;

    public $subjects;

    protected $rules = [
        'school_class_id' => 'required|exists:school_classes,id',
        'selectedSubjects' => 'array|min:1',
    ];

    public function mount()
    {
        $this->classes = SchoolClass::all();
        $this->subjects = Subject::all();
    }

    public function save()
    {
        $this->validate();
        AssignSubject::where('school_class_id', $this->school_class_id)->delete();
        foreach ($this->selectedSubjects as $subjectId) {
            AssignSubject::create([
                'school_class_id' => $this->school_class_id,
                'subject_id' => $subjectId,
            ]);
        }
        flash()->option('timeout', 2000)->success('Subjects assigned successfully!');

        return redirect()->route('assign-subject.index');
    }

    public function render()
    {
        return view('livewire.admin.assign-subject.assign-subject-create');
    }
}
