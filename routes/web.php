<?php

use App\Livewire\Dashboard;
use App\Livewire\TransactionList;
use App\Livewire\TransactionCreate;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard')->middleware('auth');
Route::get('/transactions', TransactionList::class)->name('transactions.index');
Route::get('/transactions/create', TransactionCreate::class)->name('transactions.create');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
