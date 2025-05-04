<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $sort = request('sort');
        $direction = request('direction', 'desc');

        $query = DailyReport::query();

        if ($search) {
            $query->where('id', 'like', "%{$search}%")
                  ->orWhere('project_id', 'like', "%{$search}%")
                  ->orWhere('report_date', 'like', "%{$search}%")
                  ->orWhere('weather_conditions', 'like', "%{$search}%")
                  ->orWhere('notes', 'like', "%{$search}%");
        }
        if($sort){
            $query->orderBy($sort, $direction);
        } else {
            $query->orderBy('id', 'desc');
        }
        return view('daily_reports.index', ['daily_reports' => $query->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('daily_reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required',
            'date' => 'required|date',
            'weather_conditions' => 'required|string',
            'notes' => 'required|string',
            'manpower_information' => 'required|string',
        ]);

        DailyReport::create($validatedData);

        return redirect()->route('daily_reports.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dailyReport = DailyReport::findOrFail($id);
        return view('daily_reports.show', compact('dailyReport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dailyReport = DailyReport::findOrFail($id);
        return view('daily_reports.edit', compact('dailyReport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dailyReport = DailyReport::findOrFail($id);

        $validatedData = $request->validate([
            'project_id' => 'required',
            'report_date' => 'required|date',
            'weather_conditions' => 'required|string',
            'notes' => 'required|string',
        ]);

        $dailyReport->update([
            'project_id' => $validatedData['project_id'],
            'report_date' => $validatedData['report_date'],
            'weather_conditions' => $validatedData['weather_conditions'],
            'notes' => $validatedData['notes'],
        ]);
        return redirect()->route('daily_reports.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}