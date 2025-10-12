<?php

namespace App\Livewire\Admin\Chapter;

use App\Models\Chapter;
use App\Models\SchoolClass;
use App\Models\Subject;
use Livewire\Component;

class ChapterCreate extends Component
{
    public $school_class_id;

    public $subject_id;

    public $name;

    public $code;

    public $description;

    public $subjects = []; // dynamic subjects list

    public $classes; // all classes

    public function mount()
    {
        $this->classes = SchoolClass::all();
    }

    public function updatedSchoolClassId($value)
    {
        // যখন class select হবে, ঐ class-এর subject গুলো লোড করো
        $this->subjects = Subject::whereHas('classes', function ($query) use ($value) {
            $query->where('school_class_id', $value);
        })->get();

        // subject dropdown রিসেট
        $this->subject_id = null;
    }

    public function save()
    {
        $this->validate([
            'school_class_id' => 'required',
            'subject_id' => 'required',
            'name' => 'required',
        ]);

        Chapter::create([
            'school_class_id' => $this->school_class_id,
            'subject_id' => $this->subject_id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Chapter created successfully!');
        $this->reset(['name', 'code', 'description']);
    }

    public function render()
    {
        return view('livewire.admin.chapter.chapter-create');
    }
}
