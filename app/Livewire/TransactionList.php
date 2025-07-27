<?php

namespace App\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TransactionList extends Component
{
    public $transactions;

    public function mount()
    {
        $this->transactions = Transaction::with('category')->where('user_id', auth()->id())->get();
    }

    public function delete(Transaction $transaction)
    {
        if ($transaction->user_id !== auth()->id()) {
            abort(404);
        }

        DB::beginTransaction();

        $user = auth()->user();
        if($transaction->type == 'income') {
            $user->pocket -= $transaction->amount;
        } elseif ($transaction->type == 'expense') {
            $user->pocket += $transaction->amount;
        }
        
        $user->save();
        
        $transaction->delete();

        DB::commit();

        $this->redirectIntended(route('transactions.index', absolute: false));
    }

    public function render()
    {
        return view('livewire.transaction-list');
    }
}
