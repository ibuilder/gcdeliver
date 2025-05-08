<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use Illuminate\Http\Request;

class DailyReportApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DailyReport::query();

        // Filtering
        if ($request->has('filter.project_id')) {
            $query->where('project_id', $request->input('filter.project_id'));
        }
        if ($request->has('filter.report_date')) {
            $query->where('report_date', $request->input('filter.report_date'));
        }

        // Sorting
        if ($request->has('sort')) {
            $sortFields = explode(',', $request->input('sort'));
            foreach ($sortFields as $sortField) {
                $direction = 'asc';
                if (str_starts_with($sortField, '-')) {
                    $direction = 'desc';
                    $sortField = substr($sortField, 1);
                }
                if ($sortField === 'report_date') {
                    $query->orderBy($sortField, $direction);
                }
            }}
        return response()->json($query->paginate($request->input('per_page', 15)));
    }

    /**
     * Display the specified resource.
     */
    public function show(DailyReport $dailyReport): \Illuminate\Http\JsonResponse
    {
        return response()->json($dailyReport);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'project_id' => 'required',
            'report_date' => 'required|date',
            'weather_conditions' => 'required|string',
            'notes' => 'required|string',
            'manpower_information' => 'required|string',
        ]);

        $dailyReport = DailyReport::create($validatedData);

        return response()->json($dailyReport, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DailyReport $dailyReport): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'project_id' => 'required',
            'report_date' => 'required|date',
            'weather_conditions' => 'required|string',
            'notes' => 'required|string',
            'manpower_information' => 'required|string',
        ]);

        $dailyReport->update($validatedData);
        return response()->json($dailyReport);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyReport $dailyReport): \Illuminate\Http\Response
    {
        $dailyReport->delete();
        return response(null, 204);
    }
}