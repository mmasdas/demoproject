<?php

namespace App\Livewire;

use App\Models\Good;
use Livewire\Attributes\Locked;
use Livewire\Component;

class EditModal extends Component
{
    public function render()
    {
        return view('livewire.edit-modal', [
            'products' => Good::all(),
        ]);
    }

    #[Locked]
    public int $id;

    public string $name = '';

    public string $price = '';

    public bool $showModal = false;

    public function edit($productId): void
    {
        $product = Good::find($productId);
        $this->id = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->showModal = true;
    }
}
