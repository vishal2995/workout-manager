<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWorkoutRequest;
use App\Http\Requests\UpdateWorkoutRequest;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workouts = Workout::where('user_id', auth()->id())
            ->active()
            ->orderBy('date', 'asc')
            ->get();

        return WorkoutResource::collection($workouts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkoutRequest $request)
    {
        $workout = Workout::create([
            ...$request->validated(),
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'message' => 'Workout created successfully.',
            'data' => new WorkoutResource($workout),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Workout $workout)
    {
        $this->authorizeOwnership($workout);
        return new WorkoutResource($workout);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkoutRequest $request, Workout $workout)
    {
        $this->authorizeOwnership($workout);
        $workout->update($request->validated());

        return response()->json([
            'message' => 'Workout updated successfully.',
            'data' => new WorkoutResource($workout),
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workout $workout)
    {
        $this->authorizeOwnership($workout);
        $workout->delete();
        return response()->json(['message' => 'Workout deleted successfully']);
    }

    private function authorizeOwnership(Workout $workout)
    {
        if ($workout->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
    }
}
