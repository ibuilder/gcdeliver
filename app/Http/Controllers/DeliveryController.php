<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Delivery;

class DeliveryController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Delivery::class);
        $query = Delivery::query();
        
        // Filtering
        if (request('search')) {
            $searchTerm = '%' . request('search') . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm);
                $q->orWhere('location', 'like', $searchTerm);
            });
        }

        // Sorting
        $sortableFields = ['id', 'title', 'date', 'time'];
        $sortField = in_array(request('sort'), $sortableFields) ? request('sort') : 'id';
        $sortDirection = request('direction', 'desc');
        $query->orderBy($sortField, $sortDirection);
        
        return view('deliveries.index', ['deliveries' => $query->paginate(10)->withQueryString()]);
    }

    /**
     * Show the form for creating a new delivery.
     */
    public function create()
    {   
        $this->authorize('create', Delivery::class);
        return view('deliveries.create');
    }

     /**
     * Store a newly created resource in storage.
     */
    


    public function store(Request $request)
    {
      $validatedData = $request->validate([
          'project_id' => 'required',
          'title' => 'required|string|max:255',
          'date' => 'required|date',
          'time' => 'required|string',
          'location' => 'required|string|max:255'
        ]);
        
        try {
            Delivery::create($validatedData);
            return redirect()->route('deliveries.index')->with('success', 'Delivery created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating delivery: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create delivery. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
            $this->authorize('view', Delivery::findOrFail($id));
            $delivery = Delivery::findOrFail($id);
            return view('deliveries.show', compact('delivery'));
    }

    /**
     * Show the form for editing the specified delivery.
     */
    public function edit(string $id)
    {   
        $this->authorize('update', Delivery::class);
        $delivery = Delivery::findOrFail($id);
        return view('deliveries.edit', compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     */    
    public function update(Request $request, string $id)
    {   
        $this->authorize('update', Delivery::class);
        
        $validatedData = $request->validate([
            'project_id' => 'required',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string',
            'location' => 'required|string|max:255'
        ]);
        
        try {
            $delivery = Delivery::findOrFail($id);
            $delivery->update($validatedData);
            return redirect()->route('deliveries.index')->with('success', 'Delivery updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating delivery: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update delivery. Please try again.');
        }
    }
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
