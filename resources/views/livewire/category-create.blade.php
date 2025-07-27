<div class="p-6 bg-white shadow-sm">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Create Category</h2>
    <form method="POST" wire:submit.prevent="create" class="space-y-4">
        <flux:input type="text" wire:model="name" label="Name" required />

        <flux:button type="submit">Create</flux:button>
    </form>
</div>
