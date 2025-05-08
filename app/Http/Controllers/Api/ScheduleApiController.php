<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        return response()->json($project->schedules);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, Schedule $schedule) 
    {
        return response()->json($schedule);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project) 
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $schedule = $project->schedules()->create($validatedData);

        return response()->json($schedule, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project, Schedule $schedule) 
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);
        $schedule->update($validatedData);

        return response()->json($schedule);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Schedule $schedule) 
    {   
        $schedule->delete();
        return response()->json(null, 204);
    }
}