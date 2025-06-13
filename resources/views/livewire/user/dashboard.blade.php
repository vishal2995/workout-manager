<div>
    <section class="flex flex-col mx-auto bg-white rounded-lg p-6 shadow-md space-y-6 w-full">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 w-full min-w-0">
            <div class="flex flex-col px-6 py-2 bg-white shadow rounded-lg overflow-hidden">
                <div class="flex flex-col items-center space-y-2">
                    <div class="text-6xl font-bold tracking-tight leading-none text-amber-500">
                        {{ $totalWorkoutCount }}
                    </div>
                    <div class="text-lg font-medium text-amber-600">Total Workouts</div>
                </div>
			</div>

            <div class="flex flex-col px-6 py-2 bg-white shadow rounded-lg overflow-hidden">
                <div class="flex flex-col items-center space-y-2">
                    <div class="text-6xl font-bold tracking-tight leading-none text-blue-500">
                        {{ $activeWorkoutCount }}
                    </div>
                    <div class="text-lg font-medium text-blue-500">Active Workouts</div>
                </div>
            </div>
        </div>
	</section>
</div>
