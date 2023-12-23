<?php

namespace App\Livewire\Quiz;

use App\Models\Quiz;
use Illuminate\Http\Response;
use Livewire\Component;

class QuizList extends Component
{
    public function render()
    {
        $quizzes = Quiz::latest()->paginate();

        return view('livewire.quiz.quiz-list', compact('quizzes'));
    }

    public function mount(): void
    {
    }

    public function delete(Quiz $quiz): void
    {
        abort_if(!auth()->user()->is_admin, Response::HTTP_FORBIDDEN, '403 Forboidden');

        $quiz->delete();
    }
}
