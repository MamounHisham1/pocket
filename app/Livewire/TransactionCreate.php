<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Transaction;
use Livewire\Component;

class TransactionCreate extends Component
{
    public $categories;
    public $category;
    public $amount;
    public $date;
    public $type;
    public $notes;

    public function mount()
    {
        $this->categories = Category::where('user_id', auth()->id())->get();
    }

    public function create()
    {
        $this->validate([
            'category' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'type' => 'required|in:income,expense',
            'notes' => 'nullable|string',
        ]);

        Transaction::create([
            'user_id' => auth()->id(),
            'category_id' => $this->category,
            'amount' => $this->amount,
            'date' => $this->date,
            'type' => $this->type,
            'notes' => $this->notes,
        ]);

        $this->dispatch('navigate', route('transactions.index'));
    }

    public function render()
    {
        return view('livewire.transaction-create');
    }
}
