<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {   
        Gate::authorize('manage-projects');
        return view('projects.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('manage-projects');
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);
        $project = Project::create($validatedData);
        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
        
    }

    /**
     * Display the specified Project.
     */
    public function show(Project $project): View
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        Gate::authorize('manage-projects');
        $users = User::all();

        return view('projects.edit', compact('project', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {   
        
        Gate::authorize('manage-projects');
        $validatedData = $request->validate(['name' => 'required','description' => 'nullable']);
        $project->update($validatedData);

        $selectedUserIds = $request->input('users', []);
        $project->users()->sync($selectedUserIds);

       

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        Gate::authorize('manage-projects');
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
