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
    public function index()
    {
        $partners = Partner::all();
        return response()->json($partners);
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