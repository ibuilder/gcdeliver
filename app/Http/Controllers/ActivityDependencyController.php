<?php

namespace App\Http\Controllers;

use App\Models\ActivityDependency;
use Illuminate\Http\Request;

class ActivityDependencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activityDependencies = ActivityDependency::all();//

        return view('activity_dependencies.index', compact('activityDependencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activity_dependencies.create');//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'activity_id' => 'required',
            'dependent_activity_id' => 'required',
        ]);

        ActivityDependency::create($validatedData);

        return redirect()->route('activity_dependencies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activityDependency = ActivityDependency::findOrFail($id);

        return view('activity_dependencies.show', compact('activityDependency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $activityDependency = ActivityDependency::findOrFail($id);

        return view('activity_dependencies.edit', compact('activityDependency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'activity_id' => 'required',
            'dependent_activity_id' => 'required',
        ]);

        $activityDependency = ActivityDependency::findOrFail($id);
        $activityDependency->update($validatedData);

        return redirect()->route('activity_dependencies.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activityDependency = ActivityDependency::findOrFail($id);
        $activityDependency->delete();

        return redirect()->route('activity_dependencies.index');
    }
}
