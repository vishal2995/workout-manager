<?php

namespace App\Livewire\User;

use App\Models\Workout;
use Livewire\Component;
use Livewire\WithPagination;

class Workouts extends Component
{
    use WithPagination;

    public $title, $description, $trainer, $date, $slots, $is_active = true, $editingId;
    public $showModal = false;
    public $confirmingDelete = false;
    public $deleteId = null;
    public $search;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'trainer' => 'required|string',
        'date' => 'required|date',
        'slots' => 'required|integer|min:1',
        'is_active' => 'boolean',
    ];

    public function save()
    {
        $this->validate();

        Workout::updateOrCreate(
            ['id' => $this->editingId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'trainer' => $this->trainer,
                'date' => $this->date,
                'slots' => $this->slots,
                'is_active' => $this->is_active,
                'user_id' => auth()->id(),
            ]
        );

        session()->flash('message', $this->editingId ? 'Workout updated!' : 'Workout created!');
        $this->resetForm();
    }

    public function edit($id)
    {
        $workout = Workout::where('user_id', auth()->id())->findOrFail($id);
        $this->editingId = $workout->id;
        $this->title = $workout->title;
        $this->description = $workout->description;
        $this->trainer = $workout->trainer;
        $this->date = $workout->date;
        $this->slots = $workout->slots;
        $this->is_active = $workout->is_active;
        $this->showModal = true;
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmingDelete = true;
    }

    public function deleteConfirmed()
    {
        Workout::where('user_id', auth()->id())
               ->findOrFail($this->deleteId)
               ->delete();

        $this->confirmingDelete = false;
        session()->flash('message', 'Workout deleted!');
    }

    public function resetForm()
    {
        $this->reset(['editingId', 'title', 'description', 'trainer', 'date', 'slots', 'is_active', 'showModal']);
    }

    public function render()
    {
        $query = Workout::query()
            ->where('user_id', auth()->id())
            ->when($this->search, function ($q) {
                $q->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('trainer', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('date', 'asc');
 
        return view('livewire.user.workouts', [
            'workouts' => $query->paginate(10),
        ]);
    }
}
