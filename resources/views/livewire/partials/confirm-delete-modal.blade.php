<div class="fixed inset-0 z-50 bg-black/[0.5] bg-opacity-50 flex justify-center items-center">
    <div class="bg-white rounded shadow p-6 w-full max-w-sm text-center">
        <h2 class="text-xl font-semibold mb-4">Confirm Deletion</h2>
        <p class="mb-4">Are you sure you want to delete this workout?</p>
        <div class="flex justify-center space-x-4">
            <button wire:click="deleteConfirmed" class="bg-red-600 hover:bg-gray-900 text-white cursor-pointer px-4 py-2 rounded">Yes, Delete</button>
            <button wire:click="$set('confirmingDelete', false)" class="bg-gray-900 hover:bg-gray-400 text-white hover:text-gray-900 cursor-pointer rounded px-2 py-1">Cancel</button>
        </div>
    </div>
</div>