<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class TransactionList extends Component
{
    public $transactions;

    public function mount()
    {
        $this->transactions = Transaction::where('user_id', auth()->id())->get();
    }

    public function render()
    {
        return view('livewire.transaction-list');
    }
}
