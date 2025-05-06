<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                Auth::login($user);
            } else {
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => null, // Socialite users don't need a password
                ]);

                Auth::login($newUser);
            }

            return redirect()->intended('/dashboard');
        } catch (\Exception $e) {
            // Handle authentication errors
            return redirect('/login')->with('error', 'Could not authenticate with Google.');
        }
    }

    /**
     * Redirect the user to the Office 365 authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToOffice365()
    {
        return Socialite::driver('office365')->redirect();
    }

    /**
     * Obtain the user information from Office 365.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleOffice365Callback()
    {
        try {
            $office365User = Socialite::driver('office365')->user();

            $user = User::where('email', $office365User->getEmail())->first();

            if ($user) {
                Auth::login($user);
            } else {
                $newUser = User::create([
                    'name' => $office365User->getName(),
                    'email' => $office365User->getEmail(),
                    'password' => null, // Socialite users don't need a password
                ]);

                Auth::login($newUser);
            }

            return redirect()->intended('/dashboard');
        } catch (\Exception $e) {
            // Handle authentication errors
            return redirect('/login')->with('error', 'Could not authenticate with Office 365.');
        }
    }

    /**
     * Redirect the user to the Procore authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProcore()
    {
        return Socialite::driver('procore')->redirect();
    }

    /**
     * Obtain the user information from Procore.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProcoreCallback()
    {
        try {
            $procoreUser = Socialite::driver('procore')->user();

            $user = User::where('email', $procoreUser->getEmail())->first();

            if ($user) {
                Auth::login($user);
            } else {
                $newUser = User::create([
                    'name' => $procoreUser->getName(),
                    'email' => $procoreUser->getEmail(),
                    'password' => null, // Socialite users don't need a password
                ]);

                Auth::login($newUser);
            }

            return redirect()->intended('/dashboard');
        } catch (\Exception $e) {
            // Handle authentication errors
            return redirect('/login')->with('error', 'Could not authenticate with Procore.');
        }
    }
}