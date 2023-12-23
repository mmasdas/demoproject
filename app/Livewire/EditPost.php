<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Component;

class EditPost extends Common
{
    public function render()
    {
        return view('livewire.edit-post');
    }

    public PostForm $form;

    public function mount(Post $post): void
    {
        $this->form->setPost($post);
    }

    // public bool $success = false;

    public function update(): void
    {
        $this->validate();

        $this->form->update();

        $this->success = true;
    }
}
