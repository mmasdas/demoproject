<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;

class CategoriesCreate extends Component
{
    public function render()
    {
        return view('livewire.categories-create');
    }

    public function mount(): void
    {
    }

    public CategoryForm $form;

    public function save()
    {
        $this->validate();

        $this->form->save();
    }
}
