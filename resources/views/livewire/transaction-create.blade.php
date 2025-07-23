<div class="p-6 bg-white shadow-sm">
    <h2 class="text-xl font-semibold text-gray-800">Create Transaction</h2>
    <form method="POST">
        <flux:select label="Category" />
        <flux:input type="text" label="Amount" />
        <flux:input type="text" label="Date" />
        <flux:input type="text" label="Type" />
        <flux:input type="text" label="Notes" />
        <flux:button type="primary">Create</flux:button>
    </form>
</div>
