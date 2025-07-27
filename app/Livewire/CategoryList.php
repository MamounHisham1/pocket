<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Transaction;
use Livewire\Component;

class CategoryList extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::where('user_id', auth()->id())
            ->withSum(['transactions as expenses' => function ($query) {
                $query->where('type', 'expense');
            }], 'amount')
            ->withSum(['transactions as incomes' => function ($query) {
                $query->where('type', 'income');
            }], 'amount')
            ->get();
    }

    public function delete(Category $category)
    {
        if ($category->user_id !== auth()->id()) {
            abort(404);
        }

        $category->delete();

        $this->redirectIntended(route('categories.index', absolute: false));
    }

    public function render()
    {
        return view('livewire.category-list');
    }
}
