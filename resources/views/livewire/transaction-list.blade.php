<div class="p-6 bg-white shadow-sm">
    <!-- Actions -->
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Transactions</h2>
        <div class="space-x-2">
            <flux:button type="link" variant="primary" href="{{ route('transactions.create') }}" wire.navigate>Add Transaction</flux:button>
            <flux:button type="link" >Export</flux:button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Amount</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Notes</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3">1</td>
                    <td class="px-4 py-3 font-medium">Food</td>
                    <td class="px-4 py-3">Expense</td>
                    <td class="px-4 py-3">100</td>
                    <td class="px-4 py-3">2025-01-01</td>
                    <td class="px-4 py-3">Eat out with friends</td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <button class="text-blue-600 hover:underline">View</button>
                        <button class="text-red-600 hover:underline">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
