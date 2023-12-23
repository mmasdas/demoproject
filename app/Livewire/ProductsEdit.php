<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductsForm;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsEdit extends Component
{
    use WithFileUploads;

    public function render()
    {
        return view('livewire.products-create');
    }

    public Collection $categories;

    public ProductsForm $form;

    public function mount(Product $product)
    {
        $this->form->setProduct($product);
        $this->categories = Category::pluck('name', 'id');
    }

    public function save()
    {
        $this->form->update();

        $this->redirect('/products', navigate: true);
    }
}
