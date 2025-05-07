<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use App\Models\Project;
use App\Notifications\NewDeliveryNotification;
use Illuminate\Http\Request;
use App\Models\Delivery;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function index(Project $project)
    {
        $this->authorize('manage-projects');
        $search = request('search');

        if ($search) {
            $deliveries = $project->deliveries()
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%$search%")
                        ->orWhere('location', 'like', "%$search%")
                        ->orWhere('notes', 'like', "%$search%");
                })->get();
        } else {
            $deliveries = $project->deliveries()->get();
        }
        return view('deliveries.index', compact('project', 'deliveries','search'));
    }

    /**
     * Show the form for creating a new delivery.
     */
    public function create(Project $project)
    {
        $this->authorize('manage-projects');
        
        return view('deliveries.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        Gate::authorize('manage-projects');
        $validatedData = $request->validate([
            'delivery_date' => 'required|date',
            'status' => 'nullable',
        ]);
        try {
            $delivery = $project->deliveries()->create($validatedData);
            $users = User::all();
            foreach ($users as $user) {
                $user->notify(new NewDeliveryNotification($delivery));
            }
            return redirect()->route('projects.deliveries.index', $project)->with('success', 'Delivery created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating delivery: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, Delivery $delivery)
    {
        Gate::authorize('manage-projects');
        $delivery->load('files');

        return view('deliveries.show', compact('project', 'delivery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Delivery $delivery)
    {
        Gate::authorize('manage-projects');
       
        return view('deliveries.edit', compact('project', 'delivery'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project, Delivery $delivery)
    {
        Gate::authorize('manage-projects');

        $validatedData = $request->validate([
            'delivery_date' => 'required|date',
            'status' => 'nullable',
        ]);

        try {
            $delivery->update($validatedData);
            return redirect()->route('projects.deliveries.show', [$project, $delivery])->with('success', 'Delivery updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating delivery: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update delivery. Please try again.');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Delivery $delivery)
    {
        Gate::authorize('manage-projects');

        $delivery->delete();

        return redirect()->route('projects.deliveries.index', $project)->with('success', 'Delivery deleted successfully.');

    }
}