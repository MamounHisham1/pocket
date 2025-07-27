<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class Dashboard extends Component
{
    public $expenses;
    public $incomes;
    public $recentTransactions;

    public function mount() 
    {
        $this->expenses = Transaction::where('user_id', auth()->id())->where('type', 'expense')->sum('amount');
        $this->incomes = Transaction::where('user_id', auth()->id())->where('type', 'income')->sum('amount');
        $this->recentTransactions = Transaction::with('category')->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
