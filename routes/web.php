<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

// Socialite Routes
Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

Route::get('/auth/office365', [SocialiteController::class, 'redirectToOffice365'])->name('auth.office365');
Route::get('/auth/office365/callback', [SocialiteController::class, 'handleOffice365Callback']);

Route::get('/auth/procore', [SocialiteController::class, 'redirectToProcore'])->name('auth.procore');
Route::get('/auth/procore/callback', [SocialiteController::class, 'handleProcoreCallback']);



Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('partners', PartnerController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('users', UserController::class);
    Route::get('/users/{user}/edit', [UserProfileController::class, 'edit'])->name('user.edit');
    Route::put('/users/{user}', [UserProfileController::class, 'update'])->name('user.update');
    Route::get('/users/{user}', [UserProfileController::class, 'show'])->name('user.show');
});