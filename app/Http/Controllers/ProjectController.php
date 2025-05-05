<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Project::class);
        $query = Project::query();

        // Filtering
        if (request('search')) {
            $searchTerm = '%' . request('search') . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm);
                $q->orWhere('description', 'like', $searchTerm);
            });
        }  

        $sortField = request('sort');
        $sortDirection = request('direction', 'desc');
        $validSortFields = ['id', 'name', 'start_date', 'end_date'];


        if ($sortField && in_array($sortField, $validSortFields)) {
            $query->orderBy($sortField, $sortDirection);
        } else {
            $query->orderBy('id', 'desc');
        }
        
        $query->orderBy($sortField, $sortDirection);

        $projects = $query->paginate(10);
        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create', Project::class);
        return view('projects.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $this->authorize('store', Project::class);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'partner_id' => 'required|exists:partners,id',
            'location' => 'required']);
        $project = Project::create($validatedData);

        return redirect()->route('projects.show', $project)->with('success', 'Project created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->authorize('view', [Project::class, $id]);
        $project = Project::findOrFail($id);
        return view('projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $this->authorize('update', Project::class);
        $project = Project::findOrFail($id);
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $this->authorize('update', Project::class);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'location' => 'required'
        ]);
        
        $project = Project::findOrFail($id);
        $project->update($validatedData);
       

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', Project::class);
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
        
    }
}
