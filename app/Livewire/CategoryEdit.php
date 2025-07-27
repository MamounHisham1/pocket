<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryEdit extends Component
{
    public $category;
    #[Validate('required|string|max:255')]
    public $name;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
    }

    public function update()
    {
        if($this->category->user_id !== auth()->id()) {
            abort(404);
        }
        
        $this->validate();
        
        $this->category->update([
            'name' => $this->name,
        ]);

        $this->redirectIntended(route('categories.index', absolute: false));
    }

    public function render()
    {
        return view('livewire.category-edit');
    }
}