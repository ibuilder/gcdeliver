<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Project;

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

        // Sorting
        $sortField = request('sort', 'id');
        $sortDirection = 'desc';

        if (request('direction') !== null){
             $sortDirection = request('direction');
        }
       
        if (!in_array($sortField, ['id', 'name', 'start_date', 'end_date'])) {
            $sortField = 'id';
            $sortDirection = 'desc';
        }


        $query->orderBy($sortField, $sortDirection);

        return view('projects.index', ['projects' => $query->paginate(10)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Project::class);
        return view('projects.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Project::class);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'location' => 'required'
        ]);
        try {
            Project::create($validatedData);
        } catch (\Exception $e) {
            Log::error('Error creating project: ' . $e->getMessage());
            return redirect()->route('projects.index')->with('error', 'Error creating project.');
        }

       

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
        
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

        try {
            $project = Project::findOrFail($id);
            $project->update($validatedData);
        } catch (\Exception $e) {
            Log::error('Error updating project: ' . $e->getMessage());
            return redirect()->route('projects.index')->with('error', 'Error updating project.');
        }
        

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', Project::class);
        //
    }
}
