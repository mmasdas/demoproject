<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Component;

class ShowComments extends Component
{
    public function render()
    {
        return view('livewire.show-comments');
    }

    public Collection $comments;

    public function mount(Post $post): void
    {
        $this->comments = $post->comments()->get();
    }

    public function placeholder(): string
    {
        return <<<'HTML'
            <div>
                Loading...
            </div>
        HTML;
    }
}
