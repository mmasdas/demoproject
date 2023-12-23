<?php

namespace App\Livewire;

use App\Models\Todo;
use Illuminate\Support\Collection;
use Livewire\Component;

class TodosList extends Component
{
    public Collection $todos;

    public ?Todo $selected;

    public function deselect(): void
    {
        $this->selected = null;
    }
    public function mount()
    {
        $this->todos = Todo::all();

        $this->selected = $this->todos->first();
    }

    public function select(Todo $todo)
    {
        $this->selected = $todo;
    }

    public function render()
    {
        return view('livewire.todos-list');
    }
}
