<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('partners', PartnerController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('users', UserController::class);
});
