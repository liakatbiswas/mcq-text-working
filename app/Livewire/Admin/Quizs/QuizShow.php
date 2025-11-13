<?php

namespace App\Livewire\Admin\Quizs;

use App\Models\Question;
use App\Models\Quiz;
use Livewire\Component;

class QuizShow extends Component
{
    public $quiz;

    public $answers = [];

    public $results = [];

    public $showScore = false; // Score দেখানোর flag

    public function mount(Quiz $quiz)
    {
        $this->quiz = $quiz->load('questions');
    }

    public function checkAns($questionId)
    {
        $selected = $this->answers[$questionId] ?? null;
        $question = Question::find($questionId);

        if (! $question || ! $selected) {
            return;
        }

        $correctValue = $question->{$question->correct_ans};

        if ($selected === $correctValue) {
            $this->results[$questionId] = 'correct';
        } else {
            $this->results[$questionId] = 'wrong';
        }
    }

    public function submitQuiz()
    {
        // সব প্রশ্নে উত্তর দেওয়া আছে কিনা চেক করা (optional)
        foreach ($this->quiz->questions as $q) {
            if (! isset($this->answers[$q->id])) {
                $this->answers[$q->id] = null;
                $this->results[$q->id] = 'wrong';
            }
        }

        $this->showScore = true;
    }

    public function render()
    {
        return view('livewire.admin.quizs.quiz-show');
    }
}
