<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductsForm;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsCreate extends Component
{
    use WithFileUploads;

    public function render()
    {
        return view('livewire.products-create');
    }

    public Collection $categories;

    public function mount()
    {
        $this->categories = Category::pluck('name', 'id');
    }

    public ProductsForm $form;

    public function  save(): void
    {
        // $this->validate();

        // Product::create($this->only('name', 'description', 'category_id'));

        $this->form->save();

        $this->redirect('/products', navigate: true);
    }
}
