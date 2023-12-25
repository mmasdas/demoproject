<?php

namespace App\Livewire\Questions;

use App\Models\Question;
use Livewire\Component;
use SebastianBergmann\Type\NullType;

class QuestionForm extends Component
{

    public ?Question $question = null;

    public string $question_text = '';
    public string|null $description = '';
    public string|null $answer_explanation = '';
    public string|null $more_info_link = '';

    public bool $editing = false;

    public function mount(Question $question): void
    {
        if ($question->exists) {

            $this->editing = true;

            foreach ($question->questionOptions as $option) {
                $this->questionOptions[] = [
                    'id'      => $option->id,
                    'option'  => $option->option,
                    'correct' => $option->correct,
                ];
            }

            $this->question = $question;
            $this->editing = true;
            $this->question_text = $question->question_text;
            $this->description = $question->description;
            $this->answer_explanation = $question->answer_explanation;
            $this->more_info_link = $question->more_info_link;
        }
    }

    public function save()
    {
        $this->validate();

        if (empty($this->question)) {
            $this->question = Question::create($this->only([
                'question_text', 'description', 'answer_explanation', 'more_info_link'
            ]));
        } else {
            $this->question->update($this->only([
                'question_text', 'description', 'answer_explanation', 'more_info_link'
            ]));
        }

        $this->question->questionOptions()->delete();

        foreach ($this->questionOptions as $option) {
            $this->question->questionOptions()->create($option);
        }

        return to_route('questions');
    }

    public function addQuestionsOption()
    {
        $this->questionOptions[] = [
            'option' => '',
            'correct' => false,
        ];
    }

    public function removeQuestionsOption(int $index)
    {
        unset($this->questionOptions[$index]);
        // dd(array_values($this->questionOptions));
        // $this->questionOptions = array_values($this->questionOptions);
    }

    public function rules()
    {

        return [
            'question_text' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'answer_explanation' => [
                'string',
                'nullable',
            ],
            'more_info_link' => [
                // 'url',
                'nullable',
            ],
            'questionOptions' => [
                'required',
                'array',
            ],
            'questionOptions.*.option' => [
                'required',
                'string',
            ],
        ];
    }

    public array $questionOptions = [];

    public function render()
    {
        return view('livewire.questions.question-form');
    }
}
