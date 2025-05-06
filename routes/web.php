<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('partners', PartnerController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('users', UserController::class);
    Route::get('/users/{user}/edit', [UserProfileController::class, 'edit'])->name('user.edit');
    Route::put('/users/{user}', [UserProfileController::class, 'update'])->name('user.update');
    Route::get('/users/{user}', [UserProfileController::class, 'show'])->name('user.show');
});