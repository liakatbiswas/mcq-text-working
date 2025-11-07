<?php

namespace App\Livewire\Admin\Questions;

use App\Models\Chapter;
use App\Models\Question;
use App\Models\SchoolClass;
use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class QuestionIndex extends Component
{
    use WithPagination;

    public $school_class_id = '';

    public $subject_id = '';

    public $chapter_id = '';

    public $subjects = [];

    public $chapters = [];

    public function updatedSchoolClassId($value)
    {
        $this->reset(['subject_id', 'chapter_id', 'subjects', 'chapters']);

        if ($value) {
            $this->subjects = Subject::whereIn('id', function ($q) use ($value) {
                $q->select('subject_id')
                    ->from('assign_subjects')
                    ->where('school_class_id', $value);
            })->get();
        }
    }

    public function updatedSubjectId($value)
    {
        $this->reset(['chapter_id', 'chapters']);

        if ($value && $this->school_class_id) {
            // $this->chapters = Chapter::where('school_class_id', $this->school_class_id)
            //     ->where('subject_id', $value)
            //     ->get();

            $this->chapters = Chapter::where('subject_id', $value)
            // ->where('school_class_id', $this->school_class_id)
                ->get();
        }

    }

    public function render()
    {
        $questions = Question::with(['chapter', 'subject', 'schoolClass'])
            ->when($this->school_class_id, fn ($q) => $q->where('school_class_id', $this->school_class_id))
            ->when($this->subject_id, fn ($q) => $q->where('subject_id', $this->subject_id))
            ->when($this->chapter_id, fn ($q) => $q->where('chapter_id', $this->chapter_id))
            ->latest()
            ->paginate(10);

        $school_classes = SchoolClass::all();

        return view('livewire.admin.questions.question-index', compact('questions', 'school_classes'));
    }
}
