<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $this->authorize('viewAny', DailyReport::class);
            $search = request('search');
            $sort = request('sort');

            $query = DailyReport::query();

            if ($search) {
                $query->where('id', 'like', "%{$search}%")
                    ->orWhere('project_id', 'like', "%{$search}%")
                    ->orWhere('report_date', 'like', "%{$search}%")
                    ->orWhere('weather_conditions', 'like', "%{$search}%")
                    ->orWhere('notes', 'like', "%{$search}%");
            }
            $allowedSorts = ['id', 'project_id', 'report_date', 'weather_conditions', 'notes'];
            if ($sort && in_array($sort, $allowedSorts)) {
                $query->orderBy($sort, request('direction', 'asc'));
            } else {
                $query->orderBy('id', 'desc');
            }
            return view('daily_reports.index', ['daily_reports' => $query->paginate(10)]);
        } catch (\Exception $e) {
            return back()->withError('Error filtering or sorting daily reports: ' . $e->getMessage())->withInput();
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', DailyReport::class);
        return view('daily_reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->authorize('create', DailyReport::class);
            $validatedData = $request->validate([
                'project_id' => 'required',
                'report_date' => 'required|date',
                'weather_conditions' => 'required|string',
                'notes' => 'required|string',
                'manpower_information' => 'required|string',
            ]);

            $dailyReport = DailyReport::create($validatedData);

            $adminsAndManagers = User::whereIn('role', ['admin', 'manager'])->get();

            foreach ($adminsAndManagers as $user) {
                $user->notifications()->create([
                    'type' => 'daily_report_created',
                    'notifiable_type' => 'App\Models\DailyReport',
                    'notifiable_id' => $dailyReport->id,
                    'data' => 'New daily report created: ' . $dailyReport->id,
                ]);
            }

            return redirect()->route('daily_reports.index');
        } catch (\Exception $e) {
            return back()->withError('Error creating daily report: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   $this->authorize('view', DailyReport::findOrFail($id));
        $dailyReport = DailyReport::findOrFail($id);
        return view('daily_reports.show', compact('dailyReport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $this->authorize('update', DailyReport::findOrFail($id));
        $dailyReport = DailyReport::findOrFail($id);
        return view('daily_reports.edit', compact('dailyReport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->authorize('update', DailyReport::findOrFail($id));
            $dailyReport = DailyReport::findOrFail($id);

            $validatedData = $request->validate([
                'project_id' => 'required',
                'report_date' => 'required|date',
                'weather_conditions' => 'required|string',
                'notes' => 'required|string',
            ]);

            $dailyReport->update($validatedData);
            return redirect()->route('daily_reports.index');
        } catch (\Exception $e) {
            return back()->withError('Error updating daily report: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', DailyReport::findOrFail($id));
        //
    }
}