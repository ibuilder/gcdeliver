<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Item::query();

        // Filtering
        if ($request->has('filter.name')) {
            $query->where('name', 'like', '%' . $request->input('filter.name') . '%');
        }
        if ($request->has('filter.description')) {
            $query->where('description', 'like', '%' . $request->input('filter.description') . '%');
        }

        // Sorting
        if ($request->has('sort')) {
            $sortFields = explode(',', $request->input('sort'));
            foreach ($sortFields as $sortField) {
                $direction = strpos($sortField, '-') === 0 ? 'desc' : 'asc';
                $query->orderBy(ltrim($sortField, '-'), $direction);
            }
        }
        return response()->json($query->paginate($request->input('per_page', 15)));
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {        
        return response()->json($item);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $item = Item::create($validatedData);

        return response()->json($item, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {        
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $item->update($validatedData);

        return response()->json($item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {        
        $item->delete();
        return response()->noContent();
    }
}