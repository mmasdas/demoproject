<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoriesList extends Component
{
    public CategoryForm $form;

    public function render()
    {
        $categories = Category::paginate(10);

        $this->active = $categories->mapWithKeys(
            fn (Category $item) => [$item['id'] => (bool) $item['is_active']]
        )->toArray();

        // dd($this->active);
        return view('livewire.categories-list', compact('categories'));
    }

    public function mount(): void
    {
    }

    public function toggleIsActive($categoryId)
    {
        Category::where('id', $categoryId)->update([
            'is_active' => $this->active[$categoryId],
        ]);
    }

    public array $active = [];

    public function delete($id)
    {
        $this->form->delete($id);
    }
}
