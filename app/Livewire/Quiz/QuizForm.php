<?php

namespace App\Livewire\Quiz;

use App\Models\Quiz;
use Livewire\Component;
use Spatie\FlareClient\Flare;
use Illuminate\Support\Str;

class QuizForm extends Component
{
    public function render()
    {
        return view('livewire.quiz.quiz-form');
    }

    public function mount(Quiz $quiz): void
    {
        if ($quiz->exists) {
            $this->quiz = $quiz;
            $this->editing = true;
            $this->title = $quiz->title;
            $this->slug = $quiz->slug;
            $this->description = $quiz->description;
            $this->published = $quiz->published;
            $this->public = $quiz->public;
        } else {
            $this->published = false;
            $this->public = false;
        }
    }

    public ?Quiz $quiz = null;

    public string $title = '';
    public string $slug = '';
    public string|null $description = '';
    public bool $published = false;
    public bool $public = false;

    public bool $editing = false;

    public array $questions = [];

    public array $listsForFields = [];

    public function rules(): array
    {
        return [
            'title'       => [
                'string',
                'required',
            ],
            'slug'        => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'published'   => [
                'boolean',
            ],
            'public'      => [
                'boolean',
            ],
            'questions' => [
                'array'
            ],
        ];
    }

    public function save()
    {
        $this->validate();

        if (empty($this->quiz)) {
            $this->quiz = Quiz::create($this->only([
                'title', 'slug', 'description', 'published', 'public'
            ]));
        } else {
            $this->quiz->update($this->only([
                'title', 'slug', 'description', 'published', 'public'
            ]));
        }

        return to_route('quizzes');
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }
}
