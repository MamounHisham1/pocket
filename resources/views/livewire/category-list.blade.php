<div class="p-6 bg-white shadow-sm">
    <!-- Actions -->
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Categories</h2>
        <div class="space-x-2">
            <flux:button as="a" href="{{ route('categories.create') }}" variant="primary" class="cursor-pointer">Add Category</flux:button>
            <flux:button type="link">Export</flux:button>
        </div>
    </div>

    @if ($categories->isEmpty())
    <div class="text-center text-gray-500">
        <p>No categories found</p>
    </div>
    @else
    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Expenses</th>
                    <th class="px-4 py-3">Incomes</th>
                    <th class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($categories as $category)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3 font-medium">{{ ucfirst($category->name) }}</td>
                    <td class="px-4 py-3 font-medium">{{ $category->expenses ?? 0 }}</td>
                    <td class="px-4 py-3 font-medium">{{ $category->incomes ?? 0 }}</td>
                    <td class="px-4 py-3 text-right space-x-2">
                        <flux:button as="a" href="{{ route('categories.edit', $category) }}" variant="primary" class="cursor-pointer">Edit</flux:button>
                        <form wire:submit="delete({{ $category->id }})" class="inline-block">
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
