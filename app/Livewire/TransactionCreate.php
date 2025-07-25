<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TransactionCreate extends Component
{
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

    public function mount()
    {
        $this->categories = Category::where('user_id', auth()->id())->get();
    }

    public function create()
    {
        $this->validate();

        DB::beginTransaction();
        Transaction::create([
            'user_id' => auth()->id(),
            'category_id' => $this->category,
            'amount' => $this->amount,
            'date' => $this->date,
            'type' => $this->type,
            'notes' => $this->notes,
        ]);
        $user = auth()->user();
        if ($this->type === 'income') {
            $user->pocket += $this->amount;
        } elseif ($this->type === 'expense') {
            $user->pocket -= $this->amount;
        }
        $user->save();
        DB::commit();

        $this->redirectIntended(route('transactions.index', absolute: false));
    }

    public function render()
    {
        return view('livewire.transaction-create');
    }
}
