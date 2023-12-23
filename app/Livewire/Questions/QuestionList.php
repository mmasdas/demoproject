<?php

namespace App\Livewire\Questions;

use App\Models\Question;
use Livewire\Component;

class QuestionList extends Component
{
    public function render()
    {
        $questions = Question::latest()->paginate();
        return view('livewire.questions.question-list', compact('questions'));
    }

    public function mount(): void
    {
    }
}
