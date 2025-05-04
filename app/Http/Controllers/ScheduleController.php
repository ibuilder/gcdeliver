<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use App\Notifications\NewScheduleNotification;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Schedule::class);
        $search = request('search');
        $sort = request('sort');

        $schedules = Schedule::query()
            ->when($search, function ($query, $search) {
                $query->where('task_name', 'like', '%' . $search . '%');
            })
            ->when($sort, function ($query, $sort) {
                $parts = explode('|', $sort);
                $column = $parts[0];
                $direction = $parts[1];
                $query->orderBy($column, $direction);
            })
             ->when(in_array($sort,['progress']),function($query) use ($sort){
                $query->orderByRaw("CAST(progress as UNSIGNED) DESC");})
            ->when(!$sort, function ($query) {
                $query->orderBy('id', 'desc');
            })
            ->paginate(10);

        return view('schedules.index', ['schedules' => $schedules]);
    }
    public function create(): \Illuminate\View\View
    {
        $this->authorize('create', Schedule::class);
        return view('schedules.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('create', Schedule::class);
        $validatedData = $request->validate([
            'project_id' => 'required|integer',
            'task_name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'duration' => 'required|string',
            'progress' => 'required|string',
        ]);
        $schedule= Schedule::create($validatedData);
        $users = User::whereIn('role', ['admin', 'manager'])->get();

        foreach ($users as $user) {
            $user->notify(new NewScheduleNotification(
                'New schedule created', $schedule->task_name
            ));
        }
        return redirect()->route('schedules.index');
    }

    public function show(string $id): \Illuminate\View\View
    {
        $this->authorize('view', Schedule::class);
        $schedule = Schedule::find($id);
        return view('schedules.show', ['schedule' => $schedule]);
    }

    public function edit(string $id): \Illuminate\View\View
    {
        $this->authorize('update', Schedule::class);
        $schedule = Schedule::find($id);
        return view('schedules.edit', ['schedule' => $schedule]);
    }

    public function update(Request $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $schedule = Schedule::find($id);
        $this->authorize('update', $schedule);
        $validatedData = $request->validate([
            'project_id' => 'required|integer',
            'task_name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'duration' => 'required|string',
            'progress' => 'required|string',
        ]);
        $schedule->update($validatedData);
        return redirect()->route('schedules.index');
    }
}