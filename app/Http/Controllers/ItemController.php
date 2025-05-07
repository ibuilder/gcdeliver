<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    /**
    * Display a listing of the resource.
    * @param  \App\Models\Project  $project
    * @return \Illuminate\Http\Response
    */
    public function index(Project $project)
    {
        $items = $project->items;
        return view('items.index', compact('project', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    { 
        $this->authorize('create', Item::class);
        return view('items.create', compact('project'));
    }

    /**
        * Store a newly created resource in storage.
        */
    public function store(Request $request, Project $project)
    {
        Gate::authorize('manage-projects');

        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'unit' => 'nullable',
            'status' => 'nullable',
        ]);

        $project->items()->create($validatedData);
        
        return redirect()->route('projects.items.index', $project)->with('success', 'Item created successfully.');


    }

    public function edit(Project $project, Item $item)
    {
        Gate::authorize('manage-projects');

        return view('items.edit', compact('project','item'));

    }

    public function update(Request $request, Project $project, Item $item)
    {
        Gate::authorize('manage-projects');

        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'unit' => 'nullable',
            'status' => 'nullable',
        ]);
            
        $item->update($validatedData);
        return redirect()->route('projects.items.show', [$project, $item])->with('success', 'Item updated successfully.');
    }

        /**
     * Display the specified resource.
     */
    public function show(Project $project, Item $item)
    {
        Gate::authorize('manage-projects');

        return view('items.show', compact('project', 'item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Item $item)
    {
        Gate::authorize('manage-projects');
        $item->delete();
        return redirect()->route('projects.items.index', $project)->with('success', 'Item deleted successfully.');
    }

}
