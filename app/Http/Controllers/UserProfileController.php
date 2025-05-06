<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'profile_image' => 'nullable|image|max:2048',
        ];

        if ($request->filled('current_password')) {
            $rules['password'] = 'required|confirmed|min:8';
            $rules['current_password'] = 'required';
        }

        
        if ($request->hasFile('profile_image')) {
            $rules['profile_image'] = 'image|max:2048'; // 2MB Max
        }

        

        $request->validate($rules);

        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Incorrect current password']);
            }
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
        }

        
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('remove_profile_image') && $user->profile_image) {
            Storage::disk('public')->delete($user->profile_image);
            $user->profile_image = null;
        }

        elseif ($request->hasFile('profile_image')) {
            

            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $path = Storage::putFile('profile_images', $request->file('profile_image'));

            $user->profile_image = $path;
        }

        $user->save();

        return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Profile updated successfully.');
    }
}