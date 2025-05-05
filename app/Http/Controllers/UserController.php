<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        $this->authorize('viewAny', User::class);
        
        $search = request('search'); 
        $sortField = request('sort', 'id');
        $sortDirection = request('direction', 'desc');

        $users = User::query();

        if ($search) {
            $searchTerm = '%' . $search . '%';
            $users->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', $searchTerm)
                      ->orWhere('email', 'like', $searchTerm)
                      ->orWhereHas('role', function ($roleQuery) use ($searchTerm) {
                          $roleQuery->where('name', 'like', $searchTerm);
                      });
            });
        }

        $validSortFields = ['id', 'name', 'email', 'role'];
        if (in_array($sortField, $validSortFields)) {
            if ($sortField === 'role') {
                $users->orderBy(Role::select('name')->whereColumn('id', 'users.role_id'), $sortDirection);
            } else {
                $users->orderBy($sortField, $sortDirection);
            }
        }

        return view('users.index', ['users' => $users->paginate(10)->withQueryString()]);
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('users.create');
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'role_id' => 'required'
        ]);
        $user = new User($validatedData);
        $user->password = bcrypt($request->password);
        $user->save();
    
        return to_route('users.index');
    }

    /**
    * Display the specified resource.
    */
    public function show(string $id)
    {
        $this->authorize('view', User::class);
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }


    /**
    * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        $this->authorize('update', User::class);
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $this->authorize('update', User::class);
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        }
        $user = User::findOrFail($id);
        $user->update($validatedData);

        return to_route('users.index');

    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        $this->authorize('delete', User::class);
        $user = User::findOrFail($id);
        $user->delete();
        return to_route('users.index');

    }
}
