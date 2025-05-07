<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit')->middleware('can:manage-projects');

    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

    Route::middleware(['can:manage-projects'])->group(function(){
        Route::resource('projects.items', ItemController::class)->middleware('auth');
        Route::resource('projects.deliveries', DeliveryController::class)->middleware('auth');
        Route::resource('projects.schedules', \App\Http\Controllers\ScheduleController::class)->middleware('auth');
        
        // Calendar Events Route
        Route::get('/projects/{project}/schedules/events', [\App\Http\Controllers\ScheduleController::class, 'calendarEvents'])->name('projects.schedules.events');
    });


    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update')->middleware('can:manage-projects');

    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])
        ->name('projects.destroy')
        ->middleware('can:manage-projects');
    
    Route::middleware(['can:manage-users'])->group(function () {
        Route::resource('users', UserController::class)->middleware('auth');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('partners', PartnerController::class);
    
    Route::resource('users', UserController::class);
    Route::get('/users/{user}/edit', [UserProfileController::class, 'edit'])->name('user.edit');
    Route::put('/users/{user}', [UserProfileController::class, 'update'])->name('user.update');
    Route::get('/users/{user}', [UserProfileController::class, 'show'])->name('user.show');
});