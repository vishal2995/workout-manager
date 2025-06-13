<div class="max-w-md mx-auto mt-10 space-y-4">
    <h2 class="text-xl font-bold">Register</h2>

    <form wire:submit.prevent="register" class="space-y-4">
        <div>
            <label>Name</label>
            <input type="text" wire:model="name" class="w-full border p-2 rounded">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Email</label>
            <input type="email" wire:model="email" class="w-full border p-2 rounded">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Password</label>
            <input type="password" wire:model="password" class="w-full border p-2 rounded">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Confirm Password</label>
            <input type="password" wire:model="password_confirmation" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Register</button>
    </form>
</div>
