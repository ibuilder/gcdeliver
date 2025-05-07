<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
/**
 * This class is the controller for the User model. It handles requests related to users, such as listing, creating, updating, and deleting users.
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {   
        //Check if user has the ability to manage users
        Gate::authorize('manage-users');

        // Get all users using User::all()
        $users = User::all();

        //Return the view with the users data
        return view('users.index', ['users' => $users]);

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
        Gate::authorize('manage-users');

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ]);

        //Hash the password before saving
        $validatedData['password'] = Hash::make($validatedData['password']);

        //Create the new user
        $user = User::create($validatedData);

        $user->save();
        return to_route('users.index');
    }

    /**
    * Display the specified resource.
    */
    public function show(User $user)
    {
        //Check if user has the ability to manage users
        Gate::authorize('manage-users');
        return view('users.show', compact('user'));
    }


    /**
    * Show the form for editing the specified resource.
    */
    public function edit(User $user)
    {   
        Gate::authorize('manage-users');
        return view('users.edit', compact('user'));
    }    

    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, User $user)
    {
        Gate::authorize('manage-users');
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
        ]);
        $user->update($validatedData);

        return to_route('users.index');

    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(User $user)
    {
        Gate::authorize('manage-users');
        $user->delete();
        return to_route('users.index')->with('success', 'User deleted successfully.');
    }
}
