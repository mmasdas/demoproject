<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use App\Services\PostService;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    #[Rule('required|min:5')]
    public string $title = '';

    #[Rule('required|min:5')]
    public string $body = '';

    public ?Post $post;

    public function save(PostService $postService): void
    {
        // Post::create($this->all());
        $postService->storePost($this->title, $this->body);

        $this->reset('title', 'body');
    }

    public function setPost(Post $post)
    {
        $this->post = $post;

        $this->title = $post->title;

        $this->body = $post->body;
    }

    public function update(): void
    {
        $this->post->update($this->all());
    }
}
