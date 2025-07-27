<div class="p-6 bg-white shadow-sm">
    <!-- Actions -->
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Transactions</h2>
        <div class="space-x-2">
            <flux:button as="a" href="{{ route('transactions.create') }}" variant="primary" class="cursor-pointer">Add Transaction</flux:button>
            <flux:button type="link" >Export</flux:button>
        </div>
    </div>

    @if ($transactions->isEmpty())
    <div class="text-center text-gray-500">
        <p>No transactions found</p>
    </div>
    @else
    <!-- Table -->
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
                @foreach ($transactions as $transaction)
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
    @endif
</div>
