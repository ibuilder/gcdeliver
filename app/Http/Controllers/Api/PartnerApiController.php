<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Partner::query();

        // Filtering
        if ($request->has('filter')) {
            if ($request->filled('filter.name')) {
                $query->where('name', 'like', '%' . $request->input('filter.name') . '%');
            }
            if ($request->filled('filter.contact_person')) {
                $query->where('contact_person', 'like', '%' . $request->input('filter.contact_person') . '%');
            }
            if ($request->filled('filter.email')) {
                $query->where('email', 'like', '%' . $request->input('filter.email') . '%');
            }
            if ($request->filled('filter.phone_number')) {
                $query->where('phone_number', 'like', '%' . $request->input('filter.phone_number') . '%');
            }
        }

        // Sorting
        if ($request->filled('sort')) {
            $sortFields = explode(',', $request->input('sort'));
            foreach ($sortFields as $sortField) {
                $direction = str_starts_with($sortField, '-') ? 'desc' : 'asc';
                $query->orderBy(ltrim($sortField, '-'), $direction);
            }
        }
        
        return response()->json($query->paginate($request->input('per_page', 15)));
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner): \Illuminate\Http\JsonResponse
    {
        return response()->json($partner);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'contact_person' => 'nullable|string',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|string',
        ]);

        $partner = Partner::create($validatedData);
        return response()->json($partner, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'contact_person' => 'nullable|string',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|string',
        ]);

        $partner->update($validatedData);
        return response()->json($partner);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner): \Illuminate\Http\Response
    {
        $partner->delete();
        return response(null, 204);
    }
}