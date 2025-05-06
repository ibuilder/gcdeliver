<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserProfileController extends Controller
{
    public function show(User $user)
    {
        if (!$user) {
            throw new NotFoundHttpException();
        }

        return view('user_profile', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('edit_user_profile', ['user' => $user]);
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('user.show', ['user' => $user->id]);
    }
}