<div class="fixed inset-0 z-50 bg-black/[0.5] flex justify-center items-center">
    <div class="bg-white rounded shadow p-6 w-full max-w-md">
        <h2 class="text-center text-gray-900 text-2xl font-semibold mb-6">
            {{ $editingId ? 'Edit Workout' : 'Create Workout' }}
        </h2>

        <form wire:submit.prevent="save" class="space-y-4">
            <label class="block text-gray-900 text-lg font-medium text-black mb-1">Title</label>
            <input type="text" wire:model.defer="title" placeholder="Title" class="w-full border p-2 rounded">
            @error('title') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

            <label class="block text-gray-900 text-lg font-medium text-black mb-1">Description</label>
            <textarea wire:model.defer="description" placeholder="Description" class="w-full border p-2 rounded"></textarea>

            <label class="block text-gray-900 text-lg font-medium text-black mb-1">Trainer</label>
            <input type="text" wire:model.defer="trainer" placeholder="Trainer" class="w-full border p-2 rounded">
            @error('trainer') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

            <label class="block text-gray-900 text-lg font-medium text-black mb-1">Date</label>
            <input type="datetime-local" wire:model.defer="date" class="w-full border p-2 rounded">
            @error('date') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

            <label class="block text-gray-900 text-lg font-medium text-black mb-1">Slots</label>
            <input type="number" wire:model.defer="slots" placeholder="Slots" class="w-full border p-2 rounded">
            @error('slots') <div class="text-red-500 text-sm">{{ $message }}</div> @enderror

            <label class="block">
                <input type="checkbox" wire:model.defer="is_active" {{ $this->is_active ? 'checked' : ''}} class="mr-2"> Active
            </label>

            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" wire:click="$set('showModal', false)" class="bg-gray-900 hover:bg-gray-400 text-white hover:text-gray-900 cursor-pointer rounded px-2 py-1">Cancel</button>
                <button type="submit" class="bg-blue-600 hover:bg-gray-900 text-white cursor-pointer px-4 py-2 rounded">
                    {{ $editingId ? 'Update' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
</div>