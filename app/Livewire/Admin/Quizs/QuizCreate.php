<?php

namespace App\Livewire\Admin\Quizs;

use App\Models\Quiz;
use Livewire\Component;

class QuizCreate extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|min:3',
    ];

    public function saveQuiz()
    {
        $this->validate();

        Quiz::create(['name' => $this->name]);

        $this->reset();

        flash()->option('timeout', 2000)->success('Quiz created successfully!');

        return redirect()->route('quizs.index');
    }

    public function render()
    {

        return view('livewire.admin.quizs.quiz-create');
    }
}
