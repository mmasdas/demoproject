<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsList extends Component
{
    public function render()
    {
        $products = Product::paginate(10);

        return view('livewire.products-list', compact('products'));
    }

    public function mount(): void
    {
    }
}
