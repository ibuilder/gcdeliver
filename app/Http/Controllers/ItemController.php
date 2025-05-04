<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Notifications\NewItemNotification;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $this->authorize('viewAny', Item::class);
        $query = Item::query();

        // Filtering
        if (request('search')) {
            $searchTerm = '%' . request('search') . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                    ->orWhere('spec_section', 'like', $searchTerm);
            });
        }

        // Sorting
        $sortField = request('sort', 'id');
        $sortDirection = request('direction', 'desc');

        if (!in_array($sortField, ['id', 'name', 'spec_section', 'unit', 'quantity', 'unit_price', 'lead_time'])) {
            $sortField = 'id';
            $sortDirection = 'desc';
        }

        $query->orderBy($sortField, $sortDirection);

        return view('items.index', ['items' => $query->paginate(10)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $this->authorize('create', Item::class);
        return view('items.create');
    }

    /**
        * Store a newly created resource in storage.
        */
    public function store(Request $request)
    {
        try {
            $this->authorize('create', Item::class);
            $validatedData = $request->validate([
                'project_id' => 'required|exists:projects,id',
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'spec_section' => 'required|string|max:255',
                'unit' => 'required|string',
                'quantity' => 'required|numeric',
                'unit_price' => 'required|numeric',
                'lead_time' => 'required|string',
                'status' => 'required|string',
            ]);

            $item = Item::create($validatedData);

            $users = User::whereIn('role', ['admin', 'manager'])->get();

            foreach ($users as $user) {
                $user->notify(new NewItemNotification($item->name));
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error creating the item: ' . $e->getMessage()])->withInput();
        }



        return redirect()->route('items.index');
    }

    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
        $this->authorize('update', $item);

        return view('items.edit', ['item' => $item]);
    }

    public function update(Request $request, string $id)
    {
        try {
        $item = Item::findOrFail($id);
        $this->authorize('update', $item);

        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'spec_section' => 'required|string|max:255',
            'unit' => 'required|string',
            'quantity' => 'required|numeric',
            'unit_price' => 'required|numeric',
            'lead_time' => 'required|string',
            'status' => 'required|string',
        ]);
            
        $item->update($validatedData);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error updating the item: ' . $e->getMessage()])->withInput();
        }
        return redirect()->route('items.index');
    }

    public function show(string $id)
    {
        $item = Item::findOrFail($id);
        $this->authorize('view', $item);

        return view('items.show', ['item' => $item]);
    }
}
