<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Workout;

class Dashboard extends Component
{
    public $activeWorkoutCount, $totalWorkoutCount;

    public function mount()
    {
        $this->loadActiveWorkouts();
        $this->loadTotalWorkouts();
    }

    public function loadActiveWorkouts()
    {
        $this->activeWorkoutCount = Workout::active()->count();
    }

    public function loadTotalWorkouts()
    {
        $this->totalWorkoutCount = Workout::count();
    }

    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
