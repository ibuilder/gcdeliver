<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SocialiteController,
    PartnerController,
    ProjectController,
    UserController,
    ItemController,
    DeliveryController,
    UserProfileController,
    NotificationController,
    CommentController,
    FileController,
    ScheduleController,
    HomeController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

// Authentication Routes
Auth::routes(['verify' => true]);

// OAuth Social Authentication Routes
Route::prefix('auth')->name('auth.')->group(function () {
    $socialites = ['google', 'office365', 'procore'];

    foreach ($socialites as $provider) {
        Route::get("/$provider", [SocialiteController::class, "redirectTo" . ucfirst($provider)])
            ->name($provider);
        Route::get("/$provider/callback", [SocialiteController::class, "handle" . ucfirst($provider) . "Callback"]);
    }
});

// Protected Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Notifications
    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/', [NotificationController::class, 'index'])->name('index');
        Route::patch('/{notification}/read', [NotificationController::class, 'markAsRead'])->name('markAsRead');
    });

    // User Profile Management
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
        Route::get('/edit', [UserProfileController::class, 'edit'])->name('edit');
        Route::put('/', [UserProfileController::class, 'update'])->name('update');
    });

    // File Management
    Route::prefix('files')->name('files.')->middleware('throttle:60,1')->group(function () {
        Route::post('/', [FileController::class, 'store'])->name('store');
        Route::get('/{file}/download', [FileController::class, 'download'])->name('download');
    });

    // Comments
    Route::prefix('comments')->name('comments.')->middleware('throttle:60,1')->group(function () {
        Route::post('/', [CommentController::class, 'store'])->name('store');
    });

    // Projects Management
    Route::prefix('projects')->name('projects.')->group(function () {
        // Public project routes (authenticated users)
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::get('/{project}', [ProjectController::class, 'show'])->name('show')
            ->middleware('can:view,project');

        // Project management routes
        Route::middleware(['can:manage-projects'])->group(function () {
            Route::get('/create', [ProjectController::class, 'create'])->name('create');
            Route::post('/', [ProjectController::class, 'store'])->name('store');
            Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('edit');
            Route::put('/{project}', [ProjectController::class, 'update'])->name('update');
            Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('destroy');

            // Nested Resources
            Route::resources([
                'projects.items' => ItemController::class,
                'projects.deliveries' => DeliveryController::class,
                'projects.schedules' => ScheduleController::class,
            ]);

            // Project User Management
            Route::get('/{project}/users/manage', [ProjectController::class, 'manageUsers'])
                ->name('users.manage');
            Route::post('/{project}/users/assignments', [ProjectController::class, 'updateAssignments'])
                ->name('users.updateAssignments');

            // Calendar Events
            Route::get('/{project}/schedules/events', [ScheduleController::class, 'calendarEvents'])
                ->name('schedules.events');
        });
    });

    // Admin Routes
    Route::middleware(['can:is-admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [HomeController::class, 'adminDashboard'])->name('dashboard');

        // User Management
        Route::middleware(['can:manage-users'])->group(function () {
            Route::resource('users', UserController::class);
            Route::get('users/{user}/projects/manage', [UserController::class, 'manageProjects'])
                ->name('users.projects.manage');
            Route::post('users/{user}/projects/assignments', [UserController::class, 'updateAssignments'])
                ->name('users.projects.updateAssignments');
        });

        // Partner Management
        Route::resource('partners', PartnerController::class);
    });
});

// Fallback route for undefined routes
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
