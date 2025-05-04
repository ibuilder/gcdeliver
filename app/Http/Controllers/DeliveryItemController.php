<?php

namespace App\Http\Controllers;

use App\Models\DeliveryItem;
use Illuminate\Http\Request;

class DeliveryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveryItems = DeliveryItem::all();

        return view('delivery_items.index', compact('deliveryItems'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('delivery_items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
