<div>
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Transaction</h2>
    <form wire:submit="update" class="space-y-4">
        <flux:select wire:model="category" label="Category" required>
            <flux:select.option value="">Select a category</flux:select.option>
            @foreach($categories as $category)
                <flux:select.option value="{{ $category->id }}">{{ ucfirst($category->name) }}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:input type="number" wire:model="amount" label="Amount" required />
        <flux:input type="date" wire:model="date" label="Date" required />

        <flux:select wire:model="type" label="Type" required>
            <flux:select.option value="">Select a type</flux:select.option>
            <flux:select.option value="income">Income</flux:select.option>
            <flux:select.option value="expense">Expense</flux:select.option>
        </flux:select>

        <flux:input type="text" wire:model="notes" label="Notes" />

        <flux:button type="submit">Update</flux:button>
    </form>
</div>
