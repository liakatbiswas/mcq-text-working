<?php

namespace App\Livewire\Admin\Questions;

use App\Models\Chapter;
use App\Models\Passage;
use App\Models\Question;
use App\Models\SchoolClass;
use App\Models\Subject;
use Livewire\Component;

class QuestionCreate extends Component
{
    public $school_class_id;

    public $subject_id;

    public $chapter_id;

    public $passage_id;

    public $name;

    public $ans_a;

    public $ans_b;

    public $ans_c;

    public $ans_d;

    public $correct_ans;

    public $difficulty = 'medium';

    public $explanation;

    // For new passage creation
    public $new_passage_title;

    public $new_passage_content;

    public $create_new_passage = false;

    // Dropdown data
    public $classes = [];

    public $subjects = [];

    public $chapters = [];

    public $passages = [];

    protected $rules = [
        'school_class_id' => 'required|exists:school_classes,id',
        'subject_id' => 'required|exists:subjects,id',
        'chapter_id' => 'required|exists:chapters,id',
        'name' => 'required|string',
        'ans_a' => 'required|string',
        'ans_b' => 'required|string',
        'ans_c' => 'required|string',
        'ans_d' => 'required|string',
        'correct_ans' => 'required|in:A,B,C,D',
        'difficulty' => 'required|in:easy,medium,hard',
        'explanation' => 'nullable|string',
        'passage_id' => 'nullable|exists:passages,id',
    ];

    public function mount()
    {
        $this->classes = SchoolClass::all();
        $this->subjects = [];
        $this->chapters = [];
        $this->passages = Passage::orderBy('id', 'desc')->get();
    }

    /** when class changes */
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

    /** when subject changes */
    public function updatedSubjectId($subjectId)
    {
        $this->chapter_id = null;
        $this->chapters = Chapter::where('subject_id', $subjectId)->get();
    }

    public function save()
    {
        $this->validate();

        // create new passage if needed
        if ($this->create_new_passage && $this->new_passage_title) {
            $passage = Passage::create([
                'title' => $this->new_passage_title,
                'content' => $this->new_passage_content,
            ]);
            $this->passage_id = $passage->id;
        }

        Question::create([
            'school_class_id' => $this->school_class_id,
            'subject_id' => $this->subject_id,
            'chapter_id' => $this->chapter_id,
            'passage_id' => $this->passage_id,
            'name' => $this->name,
            'ans_a' => $this->ans_a,
            'ans_b' => $this->ans_b,
            'ans_c' => $this->ans_c,
            'ans_d' => $this->ans_d,
            'correct_ans' => $this->correct_ans,
            'difficulty' => $this->difficulty,
            'explanation' => $this->explanation,
        ]);

        flash()->option('timeout', 2000)->success('Question created successfully!');

        $this->reset([
            'school_class_id', 'subject_id', 'chapter_id', 'passage_id',
            'name', 'ans_a', 'ans_b', 'ans_c', 'ans_d',
            'correct_ans', 'difficulty', 'explanation',
            'create_new_passage', 'new_passage_title', 'new_passage_content',
        ]);

        $this->classes = SchoolClass::all();
        $this->subjects = [];
        $this->chapters = [];
        $this->passages = Passage::all();
    }

    public function render()
    {
        return view('livewire.admin.questions.question-create');
    }
}
