<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Livewire\Component;

class CategoriesEdit extends Component
{
    public function render()
    {
        return view('livewire.categories-create');
    }

    public CategoryForm $form;

    public function mount(Category $category)
    {
        $this->form->setCategory($category);
    }

    public function save()
    {
        $this->validate();

        $this->form->update();
    }
}
