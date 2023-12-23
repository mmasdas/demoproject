<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateComment extends Component
{
    public function render()
    {
        return view('livewire.create-comment');
    }

    public Post $post;

    #[Rule('required')]
    public string $body = '';

    public function save(): void
    {
        $this->post->comments()->create([
            'body' => $this->body
        ]);

        $this->dispatch('comment-added');

        $this->reset('body');
    }
}
