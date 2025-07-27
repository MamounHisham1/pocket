<!-- filepath: /home/mamoun/sites/pocket/resources/views/livewire/dashboard.blade.php -->
<div class="flex h-full w-full flex-1 flex-col gap-6">
    <!-- Summary Section -->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
        <div class="p-4 border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
            <h3 class="text-lg font-semibold">Total Expenses</h3>
            <p class="text-2xl font-bold text-red-500">${{ number_format($expenses, 2) }}</p>
        </div>
        <div class="p-4 border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
            <h3 class="text-lg font-semibold">Total Incomes</h3>
            <p class="text-2xl font-bold text-green-500">${{ number_format($incomes, 2) }}</p>
        </div>
        <div class="p-4 border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
            <h3 class="text-lg font-semibold">Net Balance</h3>
            <p class="text-2xl font-bold text-blue-500">${{ number_format($incomes - $expenses, 2) }}</p>
        </div>
    </div>

    <!-- Recent Transactions Section -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Amount</th>
                    <th class="px-4 py-3">Notes</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($recentTransactions as $transaction)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3">{{ $transaction->date }}</td>
                    <td class="px-4 py-3 font-medium">{{ ucfirst($transaction->category->name) }}</td>
                    <td class="px-4 py-3">{{ ucfirst($transaction->type) }}</td>
                    <td class="px-4 py-3">{{ $transaction->amount }}</td>
                    <td class="px-4 py-3 {{ $transaction->notes ? '' : 'text-gray-400' }}">{{ $transaction->notes ?? 'N/A' }}</td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <flux:button as="a" href="{{ route('transactions.edit', $transaction) }}" variant="primary" class="cursor-pointer">Edit</flux:button>
                        <form wire:submit="delete({{ $transaction->id }})" class="inline-block">
                            <flux:button variant="danger" type="submit" class="cursor-pointer">Delete</flux:button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Budget Overview Section -->
    <div class="p-4 border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800">
        <h3 class="text-lg font-semibold">Budget Overview</h3>
        <p class="text-gray-500">This section is under construction.</p>
    </div>
</div>