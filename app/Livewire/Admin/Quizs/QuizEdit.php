<?php

namespace App\Livewire\Admin\Quizs;

use App\Models\Question;
use Illuminate\Validation\Rule;
use Livewire\Component;

class QuizEdit extends Component
{
    public $quiz;

    public $question_id;

    protected function rules()
    {
        return [
            'question_id' => [
                'required',
                'exists:questions,id',
                Rule::notIn($this->quiz->questions->pluck('id')->toArray()),
            ],
        ];
    }

    protected function messages()
    {
        return [
            'question_id.required' => 'Please select a question.',
            'question_id.exists' => 'The selected question does not exist.',
            'question_id.not_in' => 'This question is already in the quiz.',
        ];
    }

    public function addQuestion()
    {
        $this->validate();

        $this->quiz->questions()->attach($this->question_id);

        // রিলেশন রিফ্রেশ করি যাতে নতুন প্রশ্ন দেখা যায়
        $this->quiz->load('questions');

        // ইনপুট রিসেট
        $this->reset(['question_id']);

        // কম্পোনেন্ট রি-রেন্ডার
        $this->dispatch('$refresh');

        flash()->option('timeout', 2000)->success('Question added successfully!');
    }

    public function removeQuestion($questionId)
    {
        $this->quiz->questions()->detach($questionId);

        // রিলেশন রিফ্রেশ
        $this->quiz->load('questions');

        // কম্পোনেন্ট রিফ্রেশ
        $this->dispatch('$refresh');

        flash()->option('timeout', 2000)->success('Question removed successfully!');
    }

    public function render()
    {
        // শুধুমাত্র ঐসব প্রশ্ন দেখাবে যা এখনও কুইজে নেই
        $questions = Question::select('id', 'name')
            ->whereNotIn('id', $this->quiz->questions->pluck('id')->toArray())
            ->get();

        return view('livewire.admin.quizs.quiz-edit', [
            'questions' => $questions,
            // 'quizQuestions' => $this->quiz->questions,
        ]);
    }
}
