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
        $search = request('search');
        $sort = request('sort');

        $users = User::query();

        if ($search) {
            $users->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhereHas('role', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
        }

        if ($sort) {
            $sortParts = explode('|', $sort);
            $sortColumn = $sortParts[0];
            $sortDirection = $sortParts[1] ?? 'asc';
            $users->orderBy($sortColumn, $sortDirection);
        } else {
            $users->orderBy('id', 'desc');
        }

        $users = $users->paginate(10);
        return view('users.index', ['users' => $users->appends(['search' => $search, 'sort' => $sort])]);
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {

        return view('users.create');
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'role_id' => 'required'
        ]);
    
        $user = new User($validated);
        $user->password = bcrypt($request->password);
        $user->save();
    
        return to_route('users.index');
    }

    /**
    * Display the specified resource.
    */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
    }


    /**
    * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $user = User::find($id);
        $user->update($validated);
        return to_route('users.index');

    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return to_route('users.index');

    }
}
