<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryCreate extends Component
{
    #[Validate('required|string|max:255')]
    public $name;

    public function create()
    {
        $this->validate();

        Category::create([
            'user_id' => auth()->id(),
            'name' => $this->name,
        ]);

        $this->redirectIntended(route('categories.index', absolute: false));
    }

    public function render()
    {
        return view('livewire.category-create');
    }
}
