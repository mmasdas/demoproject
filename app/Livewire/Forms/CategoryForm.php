<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryForm extends Form
{
    #[Rule('required|min:5')]
    public string $name = '';

    #[Rule('nullable', 'string')]
    public $slug = '';

    public function save()
    {
        Category::create($this->all());

        $this->reset('name', 'slug');
    }

    public ?Category $category;

    public function setCategory(Category $category)
    {
        $this->category = $category;

        $this->name = $category->name;

        $this->slug = $category->slug;
    }

    public function update()
    {
        $this->category->update($this->all());
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
    }
}
