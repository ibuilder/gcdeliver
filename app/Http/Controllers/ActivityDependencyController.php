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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
