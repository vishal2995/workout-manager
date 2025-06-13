<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Dashboard') }}</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 h-screen fixed z-20">
        <div class="h-[72px] p-4 flex items-center font-bold text-xl text-white border-b">
            {{ config('app.name', 'App') }}
        </div>
        <nav class="p-4 space-y-4 mt-4">
            <a href="{{ route('dashboard') }}" class="flex gap-2 font-semibold items-center py-3 px-4 rounded-md {{ request()->routeIs('dashboard') ? 'bg-white text-gray-900 fill-gray-900' : 'bg-gray-950 text-gray-100 fill-white hover:fill-gray-900 hover:bg-white hover:text-gray-900' }}">
                <livewire:partials.icons.dashboard-icon />
                <span class="text-sm">Dashboard</span>
            </a>
            
            <a href="{{ route('workouts.index') }}" class="flex gap-2 font-semibold items-center py-3 px-4 rounded-md {{ request()->routeIs('workouts.index') ? 'bg-white text-gray-900 fill-gray-900' : 'bg-gray-950 text-gray-100 fill-white hover:bg-white hover:text-gray-900 hover:fill-gray-900' }}">
                <livewire:partials.icons.workout-icon />
                <span class="text-sm">Workout</span>
            </a>
        </nav>
    </aside>

    <!-- Main content wrapper -->
    <div class="flex-1 ml-64 flex flex-col">

        <!-- Header -->
        <header class="bg-white shadow p-4 flex items-center justify-between">
            <div class="text-xl font-bold text-gray-900">Welcome, {{ Auth::user()->name }}</div>

            <div class="flex items-center space-x-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="py-2 px-3 text-base font-medium hover:bg-gray-400 bg-gray-900 hover:text-gray-900 text-white cursor-pointer rounded-sm">Logout</button>
                </form>
            </div>
        </header>

        <!-- Page content -->
        <main class="p-6 h-[calc(100%-72px)]">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>
</html>
