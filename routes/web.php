<?php

use App\Http\Controllers\ActivityDependencyController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DeliveryItemController;
use App\Http\Controllers\ItemPartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ManpowerEntryController;
use App\Http\Controllers\GanttChartController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Example using 'only' for simplification
Route::resource('users', UserController::class)->only([
    'index', 'create', 'store', 'show', 'edit', 'update', 'destroy' // Add 'destroy' if needed
]);
// Adjust 'only' array for other resources as needed

Route::resource('partners', PartnerController::class)->only([
     'index', 'create', 'store', 'show', 'edit', 'update', 'destroy' // Add 'destroy' if needed
]);

Route::resource('projects', ProjectController::class)->only([
     'index', 'create', 'store', 'show', 'edit', 'update', 'destroy' // Add 'destroy' if needed
]);

Route::resource('items', ItemController::class)->only([
     'index', 'create', 'store', 'show', 'edit', 'update', 'destroy' // Add 'destroy' if needed
]);

Route::resource('manpower_entries', ManpowerEntryController::class); // Keep simple if all methods needed

Route::resource('deliveries', DeliveryController::class)->only([
     'index', 'create', 'store', 'show', 'edit', 'update', 'destroy' // Add 'destroy' if needed
]);

Route::resource('schedules', ScheduleController::class)->only([
     'index', 'create', 'store', 'show', 'edit', 'update', 'destroy' // Add 'destroy' if needed
]);

Route::resource('daily_reports', DailyReportController::class)->only([
     'index', 'create', 'store', 'show', 'edit', 'update', 'destroy' // Add 'destroy' if needed
]);

Route::resource('item_partners', ItemPartnerController::class); // Keep simple if all methods needed

Route::resource('delivery_items', DeliveryItemController::class); // Keep simple if all methods needed

Route::resource('activity_dependencies', ActivityDependencyController::class); // Keep simple if all methods needed

Route::get('/gantt-chart', [GanttChartController::class, 'generateGanttChart'])->name('gantt_chart');

// Remove redundant definitions below this point if covered by resources above

?>