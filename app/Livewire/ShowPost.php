<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class ShowPost extends Component
{
    #[Url(as: 'q', history: true)]
    public string $search = '';

    public function render()
    {
        return view('livewire.show-post', [
            'posts' => Post::where(
                'title',
                'like',
                '%' . $this->search . '%'
            )->get(),
        ]);
    }

    public Post $post;

    function mount()
    {
        $this->post = Post::find(70);
    }

    #[Computed]
    function comments(): Collection
    {
        return $this->post->comments()->get();
    }
}
