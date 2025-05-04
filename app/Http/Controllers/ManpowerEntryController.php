<?php

namespace App\Http\Controllers;

use App\Models\ManpowerEntry;
use Illuminate\Http\Request;

class ManpowerEntryController extends Controller
{
    /**
     * Display a listing of the manpower entries.
     */
    public function index()
    {
        $manpowerEntries = ManpowerEntry::all();

        return view('manpower_entries.index', compact('manpowerEntries'));

    }

    /**
     * Show the form for creating a new manpower entry.
     */
    public function create()
    {
        return view('manpower_entries.create');    

    }

    /**
     * Store a newly created manpower entry in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'daily_report_id' => 'required',
            'role' => 'required',
            'quantity' => 'required',
        ]);
        ManpowerEntry::create($validatedData);
        return redirect()->route('manpower_entries.index');
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
