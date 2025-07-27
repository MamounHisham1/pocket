<div class="p-6 bg-white shadow-sm">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Category</h2>
    <form wire:submit="update" class="space-y-4">
        <flux:input type="text" wire:model="name" label="Name" required />

        <flux:button type="submit">Update</flux:button>
    </form>
</div>