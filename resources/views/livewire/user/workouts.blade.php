<div class="h-full flex flex-col">
    @if (session('message'))
        <div class="bg-green-200 text-green-800 px-4 py-2 rounded">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">Your Workouts</h3>
        <button wire:click="create" class="bg-blue-600 hover:bg-gray-900 text-white cursor-pointer px-4 py-2 rounded">
            + New Workout
        </button>
    </div>


    <div class="h-full bg-white p-6 rounded shadow space-y-8">

        <div class="md:flex md:items-center">
            <input type="text" wire:model.live="search" placeholder="Search Title or Trainer" class="w-full md:w-1/4 bg-transparent border-1 border-solid border-gray-600 autofill:bg-transparent text-base font-medium foucus:outline-none focus-visible:outline-0 rounded-lg p-2">
        </div>
 
        <table class="w-full text-left">
            <thead class="border-b border-gray-300">
                <tr class="">
                    <th class="text-lg font-blod text-gray-900 text-left p-4">Title</th>
                    <th class="text-lg font-blod text-gray-900 text-left p-4">Trainer</th>
                    <th class="text-lg font-blod text-gray-900 text-left p-4">Date</th>
                    <th class="text-lg font-blod text-gray-900 text-left p-4">Slots</th>
                    <th class="text-lg font-blod text-gray-900 text-left p-4">Active</th>
                    <th class="text-lg font-blod text-gray-900 text-left p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($workouts as $workout)
                    <tr class="border-b border-gray-300">
                        <td class="px-4 py-2 text-base font-normal text-left">{{ $workout->title }}</td>
                        <td class="px-4 py-2 text-base font-normal text-left">{{ $workout->trainer }}</td>
                        <td class="px-4 py-2 text-base font-normal text-left">{{ \Carbon\Carbon::parse($workout->date)->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-2 text-base font-normal text-left">{{ $workout->slots }}</td>
                        <td class="px-4 py-2 text-base font-normal text-left">
                            <livewire:partials.icons.status-icon
                                :is-active="$workout->is_active"
                                :wire:key="'status-icon-' . $workout->id"
                            />
                        </td>
                        <td class="space-x-1 px-4 py-2 text-left">
                            <button wire:click="edit({{ $workout->id }})" class="bg-gray-900 hover:bg-gray-400 text-white hover:text-gray-900 text-sm cursor-pointer rounded px-2 py-1">Edit</button>
                            <button wire:click="confirmDelete({{ $workout->id }})" class="bg-red-600 hover:bg-gray-400 text-white hover:text-gray-900 cursor-pointer rounded text-sm px-2 py-1">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="12" class="text-center py-4">No workouts found.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $workouts->links() }}
        </div>
    </div>

    @if ($showModal)
        @include('livewire.partials.workout-modal')
    @endif

    @if ($confirmingDelete)
        @include('livewire.partials.confirm-delete-modal')
    @endif
</div>
