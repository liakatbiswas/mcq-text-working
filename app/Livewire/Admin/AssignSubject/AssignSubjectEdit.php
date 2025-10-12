<?php

namespace App\Livewire\Admin\AssignSubject;

use App\Models\AssignSubject;
use App\Models\SchoolClass;
use App\Models\Subject;
use Livewire\Component;

class AssignSubjectEdit extends Component
{
    public $school_class_id;

    public $selectedSubjects = [];

    public $classes;

    public $subjects;

    public $classId; // for route parameter or id

    protected $rules = [
        'school_class_id' => 'required|exists:school_classes,id',
        'selectedSubjects' => 'array|min:1',
    ];

    public function mount($classId)
    {
        $this->classId = $classId;

        // Load data
        $assignSubjects = AssignSubject::where('school_class_id', $classId)->get();

        // Pre-select class and subjects
        if ($assignSubjects->count() > 0) {
            $this->school_class_id = $assignSubjects->first()->school_class_id;
            $this->selectedSubjects = $assignSubjects->pluck('subject_id')->toArray();
        }

        $this->classes = SchoolClass::all();
        $this->subjects = Subject::all();
    }

    public function update()
    {
        $this->validate();

        // Delete old assigned subjects
        AssignSubject::where('school_class_id', $this->classId)->delete();

        // Re-insert new selected subjects
        foreach ($this->selectedSubjects as $subjectId) {
            AssignSubject::create([
                'school_class_id' => $this->school_class_id,
                'subject_id' => $subjectId,
            ]);
        }

        session()->flash('success', 'Assigned subjects updated successfully!');

        return redirect()->route('assign-subject.index');
    }

    public function render()
    {
        return view('livewire.admin.assign-subject.assign-subject-edit');
    }
}
