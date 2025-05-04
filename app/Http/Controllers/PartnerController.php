<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Exception;
use Illuminate\Support\Facades\DB;
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
        
        if ($search) {\n            $searchTerm = \'%\' . $search . \'%\';\n            $partners->where(function ($query) use ($searchTerm) {\n                $query->where(\'name\', \'like\', $searchTerm)\n                      ->orWhere(\'address\', \'like\', $searchTerm)\n                      ->orWhere(\'contact_person\', \'like\', $searchTerm)\n                      ->orWhere(\'phone_number\', \'like\', $searchTerm)\n                      ->orWhere(\'email\', \'like\', $searchTerm);\n            });\n        }\n\n        if ($sort) {\n            $validSortFields = [\'id\', \'name\', \'address\', \'contact_person\', \'phone_number\', \'email\'];\n            $sortDirection = request(\'direction\', \'asc\');\n            if (in_array($sort, $validSortFields)) {\n                $partners->orderBy($sort, $sortDirection);\n            } else {\n                $partners->orderBy(\'id\', \'desc\');\n            }\n        } else {\n            $partners->orderBy(\'id\', \'desc\');\n        }\n\n        $partners = $partners->paginate(10);\n        return view('partners.index', ['partners' => $partners]);
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
        $this->authorize('create', Partner::class);
        try{\n            $validatedData = $request->validate([\n                'name' => 'required',\n                'address' => 'required',\n                'contact_person' => 'required',\n                'phone_number' => 'required',\n                'email' => 'required'\n            ]);\n            \n            Partner::create($validatedData);\n            return redirect()->route('partners.index')->with('success', 'Partner created successfully.');\n\n        }catch (\Exception $e){\n            return redirect()->back()->withErrors(['error' => 'Error creating partner: ' . $e->getMessage()])->withInput();\n\n        }
    
       
        }
        
    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
      $partner = Partner::findOrFail($id);
      $this->authorize('view', $partner);
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
    public function update(Request $request, string $id)
    {
        try {
            $partner = Partner::findOrFail($id);
            $this->authorize('update', $partner);
    
            $validatedData = $request->validate([
                'name' => 'required',
                'address' => 'required',
                'contact_person' => 'required',
                'phone_number' => 'required',
                'email' => 'required'
            ]);
    
            $partner->update($validatedData);
            return redirect()->route('partners.index')->with('success', 'Partner updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error updating partner: ' . $e->getMessage()])->withInput();
        }
    }



}
