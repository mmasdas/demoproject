<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Autorefresh extends Component
{
    public function render()
    {
        // $cat = file_get_contents('https://random.dog/woof.json');
        // $image = json_decode($cat, true)['url'];

        $messages = Message::orderBy('id', 'desc')->get();

        return view('livewire.autorefresh', compact('messages'));
    }

    #[Rule('required')]
    public string $title;

    public function save(): void
    {
        $this->validate();

        Message::create($this->all());

        $this->reset(['title']);
    }
}
