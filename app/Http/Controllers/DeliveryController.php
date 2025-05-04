<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::denies('is-admin') && Gate::denies('is-manager') && Gate::denies('is-user')) {
            abort(403, 'Unauthorized action.');
        }

        $search = request('search');
        $sort = request('sort');

        $deliveries = Delivery::query();

        if ($search) {
            $deliveries->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('id', 'like', "%{$search}%");
            });
        }

        $deliveries->orderBy($sort ? $sort : 'id', $sort == 'id' ? 'desc' : 'asc');

        $deliveries = $deliveries->paginate(10);

        return view('deliveries.index', ['deliveries' => $deliveries]);
    }

    /**
     * Show the form for creating a new delivery.
     */
    public function create()
    {
        if (Gate::denies('is-admin') && Gate::denies('is-manager')) {
            abort(403, 'Unauthorized action.');
        }
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
          'location' => 'required|string|max:255',
        ]);
        if (Gate::denies('is-admin') && Gate::denies('is-manager')) {
            abort(403, 'Unauthorized action.');
        
      ]);

        $validatedData = $request->validate([
            'project_id' => 'required',
            'title' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'unload_duration' => 'required',
            'title' => 'required',
            'project_id' => 'required'

        ]);
        Delivery::create($validatedData);
        return redirect()->route('deliveries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

            if (Gate::denies('is-admin') && Gate::denies('is-manager') && Gate::denies('is-user')) {
                abort(403, 'Unauthorized action.');
            }

            $delivery = Delivery::findOrFail($id);
            return view('deliveries.show', compact('delivery'));
        }

    /**




     * Show the form for editing the specified delivery.
     */
    public function edit(string $id){
        $delivery = Delivery::findOrFail($id);
        return view('deliveries.edit', compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        if (Gate::denies('is-admin') && Gate::denies('is-manager')) {
            abort(403, 'Unauthorized action.');
        }
        $delivery = Delivery::findOrFail($id);

        $validatedData = $request->validate([
            'project_id' => 'required',
            'title' => 'required',
            'date' => 'required',
            'time' => 'required',
            'location' => 'required',
            'unload_duration' => 'required',
        ]);

        $delivery->update($validatedData);

        return redirect()->route('deliveries.index');
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
