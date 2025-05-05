<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Partner::class);
        $query = Partner::query();

        // Filtering
        if (request('search')) {
            $searchTerm = '%' . request('search') . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm);
                $q->orWhere('contact_information', 'like', $searchTerm);
            });
        }

        $sortField = request('sort');
        $sortDirection = request('direction', 'desc');
        $validSortFields = ['id', 'name', 'contact_information'];


        if ($sortField && in_array($sortField, $validSortFields)) {
            $query->orderBy($sortField, $sortDirection);
        } else {
            $query->orderBy('id', 'desc');
        }

        $partners = $query->paginate(10);
        return view('partners.index', ['partners' => $partners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create', Partner::class);
        return view('partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $this->authorize('create', Partner::class);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'contact_information' => 'required|max:255',
            
        ]);
        $partner = Partner::create($validatedData);
        return redirect()->route('partners.show', $partner)->with('success', 'Partner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {        
        $this->authorize('view', [Partner::class, $partner]);
        return view('partners.show', ['partner' => $partner]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner):View
    {        
        $this->authorize('update', $partner);
        return view('partners.edit', ['partner' => $partner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {        
        $this->authorize('update', $partner);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'contact_information' => 'required|max:255',
            
        ]);
        
        $partner->update($validatedData);
        return redirect()->route('partners.index')->with('success', 'Partner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {        
        $this->authorize('delete', $partner);
        $partner->delete();
        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully.');
    }
}
