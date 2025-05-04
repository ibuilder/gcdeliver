<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;


class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Partner::class);
        $search = request('search');
        $sort = request('sort');

        $partners = Partner::query();

        if ($search) {

            $partners->where('name', 'like', "%{$search}%")
                     ->orWhere('address', 'like', "%{$search}%")
                     ->orWhere('contact_person', 'like', "%{$search}%")
                     ->orWhere('phone_number', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%");
        }

        if ($sort) {
            $partners->orderBy($sort, request('order', 'asc'));
        } else {
            $partners->orderBy('id', 'desc');
        }
        $partners = $partners->paginate(10);
        return view('partners.index', ['partners' => $partners]);
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {
        $this->authorize('create', Partner::class);
        return view('partners.create');
    }
    
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'phone_number' => 'required',
            'email' => 'required'
        ]);

        $this->authorize('create', Partner::class);
        Partner::create($validatedData);
        return redirect()->route('partners.index');
    }
    
    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
      $partner = Partner::findOrFail($id);

      return view('partners.show', ['partner' => $partner]);
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);
        $this->authorize('update', $partner);
        return view('partners.edit', ['partner' => $partner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'phone_number' => 'required',
            'email' => 'required'
        ]);
        $this->authorize('update', $partner);
        $partner->update($validatedData);
        return redirect()->route('partners.index');
    }



}
