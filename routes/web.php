<?php

use App\Livewire\CategoryCreate;
use App\Livewire\CategoryEdit;
use App\Livewire\CategoryList;
use App\Livewire\Dashboard;
use App\Livewire\TransactionList;
use App\Livewire\TransactionCreate;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\TransactionEdit;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/transactions', TransactionList::class)->name('transactions.index');
    Route::get('/transactions/create', TransactionCreate::class)->name('transactions.create');
    Route::get('/transactions/{transaction}/edit', TransactionEdit::class)->name('transactions.edit');
    Route::get('/categories', CategoryList::class)->name('categories.index');
    Route::get('/categories/create', CategoryCreate::class)->name('categories.create');
    Route::get('/categories/{category}/edit', CategoryEdit::class)->name('categories.edit');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
