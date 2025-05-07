<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class ScheduleController extends Controller {
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
     public function calendarEvents(Request $request, Project $project)
    {
        $start = $request->query('start');
        $end = $request->query('end');
        
        $schedules = $project->schedules();

        if ($start && $end) {
            $schedules->where('start_date', '>=', $start)
                      ->where('end_date', '<=', $end);
        }

        $events = $schedules->get()->map(function ($schedule) {
            return [
                'title' => $schedule->task_name,
                'start' => $schedule->start_date,
                'end' => $schedule->end_date,
                'url' => route('projects.schedules.show', [$schedule->project, $schedule]),
            ];
        });        
      return response()->json($events);
    }
    public function store(Request $request, Project $project)    
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
        $schedule->load('dependencies', 'users');
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

    public function showDependencies(Project $project, Schedule $schedule)
    {
        Gate::authorize('manage-projects');
        $projectSchedules = $project->schedules()->where('id', '!=', $schedule->id)->get();
        return view('schedules.dependencies', [
            'schedule' => $schedule,
            'projectSchedules' => $projectSchedules,
            'project' => $project,
        ]);
    }

    public function addDependency(Project $project, Schedule $schedule, Request $request)
    {
        Gate::authorize('manage-projects');
        
        $dependentScheduleId = $request->input('dependent_schedule_id');
        $dependencySchedule = Schedule::findOrFail($dependentScheduleId);

        
        $schedule->dependencies()->attach($dependencySchedule);

        return redirect()->route('projects.schedules.show', [
            'project' => $project,
            'schedule' => $schedule
        ])->with('success', 'Dependency added successfully');
    }

    public function removeDependency(Project $project, Schedule $schedule, Request $request)
    {
        Gate::authorize('manage-projects');
        $dependentScheduleId = $request->input('dependent_schedule_id');
        $dependencySchedule = Schedule::findOrFail($dependentScheduleId);
        $schedule->dependencies()->detach($dependencySchedule);

        return redirect()->route('projects.schedules.show', [
            'project' => $project,
            'schedule' => $schedule
        ])->with('success', 'Dependency removed successfully');
    }

    public function showResourceAllocation(Project $project, Schedule $schedule)
    {
        Gate::authorize('manage-projects');
        $allUsers = User::all();
        return view('schedules.resources', [
            'schedule' => $schedule,
            'allUsers' => $allUsers,
            'project' => $project,
        ]);
    }

    public function assignUser(Project $project, Schedule $schedule, Request $request)
    {
        Gate::authorize('manage-projects');

        $userId = $request->input('user_id');
        $user = User::findOrFail($userId);

        $schedule->users()->attach($user);

        return redirect()->route('projects.schedules.show', [$project, $schedule])->with('success', 'User assigned successfully.');
    }

    public function removeUser(Project $project, Schedule $schedule, Request $request)
    {
        Gate::authorize('manage-projects');
        $userId = $request->input('user_id');
        $user = User::findOrFail($userId);

        $schedule->users()->detach($user);

        return redirect()->route('projects.schedules.show', [$project, $schedule])->with('success', 'User removed successfully.');
    }
}