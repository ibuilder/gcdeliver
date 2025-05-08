<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Notifications\DeliveryStatusUpdatedNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DeliveryApiController extends Controller
{
    /**
     * Display a listing of the deliveries for a project.
     */
    public function index(Project $project): JsonResponse
    {
        $query = $project->deliveries();

        // Filtering
        if ($deliveryDate = request('filter.delivery_date')) {
            $query->where('delivery_date', $deliveryDate);
        }
        if ($status = request('filter.status')) {
            $query->where('status', $status);
        }

        // Sorting
        if ($sort = request('sort')) {
            $sortFields = explode(',', $sort);
            foreach ($sortFields as $sortField) {
                $direction = str_starts_with($sortField, '-') ? 'desc' : 'asc';
                $field = ltrim($sortField, '-');
                $query->orderBy($field, $direction);
            }
        }
        return response()->json($query->paginate(request('per_page', 15)));
    }
    

    /**
     * Display the specified delivery.
     */
    public function show(Project $project, Delivery $delivery): JsonResponse
    {
        // Ensure the delivery belongs to the project
        if ($project->id !== $delivery->project_id) {
            return response()->json(['message' => 'Delivery not found for this project'], 404);        }
        return response()->json($delivery);
    }

    /**
     * Store a newly created delivery in storage.
     */
    public function store(Request $request, Project $project): JsonResponse
    {
        $validatedData = $request->validate([
            'delivery_date' => 'required|date',
            'status' => 'nullable|string',
        ]);

        $delivery = $project->deliveries()->create($validatedData);

        return response()->json($delivery, 201);

    /**
     * Update the specified delivery in storage.
     */
    public function update(Request $request, Project $project, Delivery $delivery): JsonResponse
    {
        // Ensure the delivery belongs to the project
        if ($project->id !== $delivery->project_id) {
            return response()->json(['message' => 'Delivery not found for this project'], 404);        }
        $validatedData = $request->validate([
            'delivery_date' => 'required|date',
            'status' => 'nullable|string',
        ]);
        
        $originalStatus = $delivery->status;
        $delivery->update($validatedData);

        if ($originalStatus !== $delivery->status) {
            $users = $project->users;
            Notification::send($users, new DeliveryStatusUpdatedNotification($delivery));
        }
        return response()->json($delivery);
    }
    }
    /**
     * Remove the specified delivery from storage.
     */
    public function destroy(Project $project, Delivery $delivery): JsonResponse
    {
        // Ensure the delivery belongs to the project
        if ($project->id !== $delivery->project_id) {
            return response()->json(['message' => 'Delivery not found for this project'], 404);
        }

        $delivery->delete();

        return response()->json(null, 204);
    }
}