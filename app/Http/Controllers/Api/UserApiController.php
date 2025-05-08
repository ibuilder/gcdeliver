<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $query = User::query();

        // Filtering
        if ($name = request('filter.name')) {
            $query->where('name', 'like', "%{$name}%");
        }
        if ($email = request('filter.email')) {
            $query->where('email', 'like', "%{$email}%");
        }
        if ($roleId = request('filter.role_id')) {
            $query->where('role_id', $roleId);
        }

        // Sorting
        if ($sort = request('sort')) {
            $sortFields = explode(',', $sort);
            foreach ($sortFields as $field) {
                $direction = str_starts_with($field, '-') ? 'desc' : 'asc';
                $query->orderBy(ltrim($field, '-'), $direction);
            }        }
        return response()->json($query->paginate(request('per_page', 15)));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): \Illuminate\Http\JsonResponse
    {
        return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        return response()->json($user, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role_id' => 'required',
        ]);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $user->update($validatedData);

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): \Illuminate\Http\Response
    {
        $user->delete();
        return response(null, 204);
    }
}