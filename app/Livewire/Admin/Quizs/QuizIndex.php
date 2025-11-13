<?php

namespace App\Livewire\Admin\Quizs;

use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithPagination;

class QuizIndex extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.quizs.quiz-index', [
            'quizzes' => Quiz::latest()->paginate(),
        ]);
    }

    public function delete($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();
        flash()->option('timeout', 2000)->success('Quiz deleted successfully!');
        $this->resetPage();
    }
}
