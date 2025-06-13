<div class="h-screen w-full flex items-center">
    <div class="w-full lg:w-1/2 h-full bg-cover bg-no-repeat bg-right" style="background-image: url('{{ asset('assets/images/auth-img.jpg') }}')">

    </div>
    <div class="w-full lg:w-1/2">
        <div class="lg:max-xl:-w-3/5 2xl:min-lg:w-1/2 mx-auto bg-gray-900 rounded-lg shadow-lg p-6 2xl:p-10">

            <h2 class="text-center text-white text-4xl font-semibold mb-10">Login</h2>

            <form wire:submit.prevent="login" class="space-y-5">
                <div>
                    <label class="block text-white text-lg font-medium text-black mb-1">Email</label>
                    <input type="email" wire:model="email" class="w-full text-white bg-transparent border-1 border-solid border-white autofill:bg-transparent text-base font-medium foucus:outline-none focus-visible:outline-0 rounded-lg p-4">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-white text-lg font-medium text-black mb-1">Password</label>
                    <input type="password" wire:model="password" class="w-full text-white bg-transparent border-1 border-solid border-white autofill:bg-transparent text-base font-medium foucus:outline-none focus-visible:outline-0 rounded-lg p-4">
                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="text-white text-sm font-normal text-black mb-1"><input type="checkbox" wire:model="remember"> Remember me</label>
                </div>

                <button type="submit" class="w-full hover:bg-white bg-gray-600 hover:text-gray-900 text-white cursor-pointer text-lg rounded-lg px-16 py-4">Login</button>
            </form>
        </div>
    </div>
</div>

