<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
// use App\Models\Post;
// use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class CreatePost extends Common
{

    public string $hello = '';

    public function mount(string $hello = null): void
    {
        // $this->hello = $hello;
    }

    public PostForm $form;

    // #[Layout('layouts.app')]
    #[Title('Create Post')]
    public function render()
    {
        return view('livewire.create-post');
    }

    public function validateTitle(): void
    {
        $this->validateOnly('form.title');
    }
    // public bool $success = false;

    public function updated($property): void
    {
        if ($property == 'form.title') {
            $this->form->title = Str::headline($this->form->title);
        }
    }

    public function save(): void
    {
        $this->validate();


        $this->form->save();

        $this->success = true;

        // $this->reset('form.title', 'form.body');
    }
}
