<?php

namespace App\Http\Controllers;
use App\Models\Project;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Notifications\NewScheduleNotification;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Project $project
     * @return \Illuminate\View\View
     */
    public function index(Project $project): \Illuminate\View\View
    {
        return view('schedules.index', ['project' => $project, 'schedules' => $project->schedules]);
    }
    public function create(Project $project): \Illuminate\View\View
    {
        return view('schedules.create', ['project' => $project]);
    }
    public function store(Request $request, Project $project): \Illuminate\Http\RedirectResponse
    {
         Gate::authorize('manage-projects');
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);
        
        $schedule = $project->schedules()->create($validatedData);
        return redirect()->route('projects.schedules.index', $project)->with('success', 'Schedule created successfully.');
    }

    public function show(Project $project, Schedule $schedule): \Illuminate\View\View
    {
         Gate::authorize('manage-projects');
        return view('schedules.show', compact('project', 'schedule'));
    }

    public function edit(Project $project, Schedule $schedule): \Illuminate\View\View
    {
        Gate::authorize('manage-projects');
        return view('schedules.edit', ['project' => $project,'schedule' => $schedule]);
    }

    public function update(Request $request, Project $project, Schedule $schedule): \Illuminate\Http\RedirectResponse
    {
        Gate::authorize('manage-projects');
        $validatedData = $request->validate(['name' => 'nullable|string','start_date' => 'required|date','end_date' => 'nullable|date']);
        $schedule->update($validatedData);
        return redirect()->route('projects.schedules.show', [$project, $schedule])->with('success', 'Schedule updated successfully.');
    }

    public function destroy(Project $project, Schedule $schedule): \Illuminate\Http\RedirectResponse
    {
        Gate::authorize('manage-projects');
        $schedule->delete();

        return redirect()->route('projects.schedules.index', $project)->with('success', 'Schedule deleted successfully.');
    }
}