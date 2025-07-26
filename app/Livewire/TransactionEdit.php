<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TransactionEdit extends Component
{
    public $transaction;
    public $categories;
    #[Validate('required')]
    public $category;
    #[Validate('required|numeric')]
    public $amount;
    #[Validate('required|date')]
    public $date;
    #[Validate('required|in:income,expense')]
    public $type;
    #[Validate('nullable|string')]
    public $notes;

    public function mount(Transaction $transaction)
    {
        $this->transaction = $transaction;
        $this->categories = Category::where('user_id', auth()->id())->get();
        $this->category = $transaction->category_id;
        $this->amount = $transaction->amount;
        $this->date = $transaction->date;
        $this->type = $transaction->type;
        $this->notes = $transaction->notes;
    }

    public function update()
    {
        if($this->transaction->user_id !== auth()->id()) {
            abort(404);
        }
        $this->validate();
        $this->transaction->update([
            'category_id' => $this->category,
            'amount' => $this->amount,
            'date' => $this->date,
            'type' => $this->type,
            'notes' => $this->notes,
        ]);

        $this->redirectIntended(route('transactions.index', absolute: false));
    }

    public function render()
    {
        return view('livewire.transaction-edit');
    }
}
