<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller; // Note: Controller class is usually a base class, not directly used in routes.
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ScheduleController; // Added for consistency
use App\Http\Controllers\HomeController; // Assuming this is the correct namespace

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

// Admin Routes
Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Admin Dashboard';
    });
});


Route::middleware(['auth'])->group(function () {
    // File Routes
    Route::post('/files', [FileController::class, 'store'])->name('files.store');
    Route::get('/files/{file}/download', [FileController::class, 'download'])->name('files.download');

    // Comment Routes
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    // Notification Routes
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::patch('/notifications/{notification}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

    Route::get('/projects/create', [ProjectController::class, 'create'])
                ->name('projects.create')->middleware('can:manage-projects');
    Route::post('/projects', [ProjectController::class, 'store'])
                ->name('projects.store')->middleware('can:manage-projects');
    //Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects', function () { return view('projects.index'); })->name('projects.index');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit')->middleware('can:manage-projects');

    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

    Route::middleware(['can:manage-projects'])->group(function(){
        // Removed redundant ->middleware('auth')
        Route::resource('projects.items', ItemController::class);
        Route::resource('projects.deliveries', DeliveryController::class);
        Route::resource('projects.schedules', ScheduleController::class); // Use imported class
        
        // Project User Management Routes
        Route::get('/projects/{project}/users/manage', [ProjectController::class, 'manageUsers'])->name('projects.users.manage');
        Route::post('/projects/{project}/users/updateAssignments', [ProjectController::class, 'updateAssignments'])
            ->name('projects.users.updateAssignments');
        
        Route::middleware(['can:manage-users'])->group(function () {
            Route::get('/users/{user}/projects/manage', [UserController::class, 'manageProjects'])->name('users.projects.manage');
            Route::post('/users/{user}/projects/updateAssignments', [UserController::class, 'updateAssignments'])->name('users.projects.updateAssignments');
        });
        // Calendar Events Route
        Route::get('/projects/{project}/schedules/events', [ScheduleController::class, 'calendarEvents'])->name('projects.schedules.events'); // Use imported class
    });


    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update')->middleware('can:manage-projects');

    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])
        ->name('projects.destroy')
        ->middleware('can:manage-projects');
    
    Route::middleware(['can:manage-users'])->group(function () {
        // Removed redundant ->middleware('auth')
        // This is the primary definition for user management, protected by 'can:manage-users'
        Route::resource('users', UserController::class); 
    });
    Route::get('/home', [HomeController::class, 'index'])->name('home'); // Ensured HomeController is used if imported
    
    Route::resource('partners', PartnerController::class);
    
    // Remove or consolidate the second Route::resource('users', UserController::class);
    // The one inside 'can:manage-users' group (line 66 in original) should likely be the sole one.
    // Route::resource('users', UserController::class); // This line (original line 70) is likely redundant or conflicting

    // Review UserProfileController routes for conflicts with UserController resource routes
    // If UserProfileController handles specific aspects like the current user's own profile,
    // consider different route paths (e.g., /profile/edit) to avoid clashes with /users/{id}/edit.
    // If it's for general user profile viewing/editing by admins, functionality might belong in UserController.
    Route::get('/users/{user}/profile', [UserProfileController::class, 'show'])->name('user.profile.show'); // Example: Changed path
    Route::get('/users/{user}/profile/edit', [UserProfileController::class, 'edit'])->name('user.profile.edit'); // Example: Changed path
    Route::put('/users/{user}/profile', [UserProfileController::class, 'update'])->name('user.profile.update'); // Example: Changed path
});