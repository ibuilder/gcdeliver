<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $search = request('search');
        $sort = request('sort');

        $items = Item::query();

        if ($search) {
            $items->where('name', 'like', '%' . $search . '%')
                ->orWhere('spec_section', 'like', '%' . $search . '%');
        }

        if ($sort) {
            $items->orderBy($sort, request('direction', 'asc'));
        }else{
            $items->orderBy('id', 'desc');


        }

        return view('items.index', ['items' => $items->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('items.create');
    }

    /**
        * Store a newly created resource in storage.
        */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'spec_section' => 'required|string|max:255',
            'unit' => 'required|string',
            'lead_time' => 'required|string',
            'status' => 'required|string',
        ]);
        
        $item = Item::create($validatedData);

        return redirect()->route('items.index');
    }

    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', ['item' => $item]);
    }
    public function update(Request $request, string $id)
    {
        $item = Item::findOrFail($id);
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
        ]);
        $item->update($request->all());
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::findOrFail($id);

        return view('items.show', ['item' => $item]);
    }
}
