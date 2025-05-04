<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Facades\Log;
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
        $sortField = request('sort', 'id');
        $sortDirection = request('direction', 'desc');

        $query = Schedule::query();

        if ($search) {
            $query->where('task_name', 'like', '%' . $search . '%');
        }
        if (in_array($sortField, ['id', 'task_name', 'start_date', 'end_date', 'duration', 'progress'])) {
            if ($sortField === 'progress') {
                $query->orderByRaw("CAST(progress as UNSIGNED) $sortDirection");
            }else{
                $query->orderBy($sortField, $sortDirection);
            }
        } else {
            $query->orderBy('id', 'desc');
        }
        $schedules = $query
             ->when(!$sortField, function ($query) {
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
        try {
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
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors([
                'error' => 'An error occurred while creating the schedule.',
            ])->withInput();
        }
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
        try {
            $schedule = Schedule::findOrFail($id);
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
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors([
                'error' => 'An error occurred while updating the schedule.',
            ])->withInput();
        }
    }
}