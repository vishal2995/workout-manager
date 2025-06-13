<?php

namespace App\Livewire\Partials\Icons;

use Livewire\Component;

class StatusIcon extends Component
{
    public bool $isActive;

    public function render()
    {
        return view('livewire.partials.icons.status-icon');
    }
}
