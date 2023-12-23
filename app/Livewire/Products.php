<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public function deleteProduct(int $productId)
    {
        Product::where('id', $productId)->delete();
    }

    public function render()
    {
        sleep(1);
        $products = Product::with('categories')
            ->when($this->searchQuery !== '', fn (Builder $query) => $query->where('name', 'like', '%' . $this->searchQuery . '%'))
            // ->when($this->searchCategory > 0, fn (Builder $query) => $query->where('category_id', $this->searchCategory))
            ->when($this->searchCategory > 0, function (Builder $query) {
                $query->whereHas('categories', function (Builder $query2) {
                    $query2->where('id', $this->searchCategory);
                });
            })
            ->paginate(10);

        return view('livewire.products', [
            'products' => $products,
        ]);
    }

    public Collection $categories;

    public function mount(): void
    {
        $this->categories = Category::pluck('name', 'id');
    }

    public string $searchQuery = '';

    public int $searchCategory = 0;

    public function updating($key)
    {
        if ($key === 'searchQuery' || $key === 'searchCategory') {
            $this->resetPage();
        }
    }
}
