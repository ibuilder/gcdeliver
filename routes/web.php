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

Route::resource('users', UserController::class)->except(['destroy']);
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::resource('partners', PartnerController::class)->except(['store', 'index', 'show', 'create', 'edit', 'update']);
Route::post('/partners', [PartnerController::class, 'store'])->name('partners.store');
Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
Route::get('/partners/{id}', [PartnerController::class, 'show'])->name('partners.show');
Route::get('/partners/create', [PartnerController::class, 'create'])->name('partners.create');
Route::get('/partners/{id}/edit',[PartnerController::class, 'edit'])->name('partners.edit');
Route::put('/partners/{id}', [PartnerController::class, 'update'])->name('partners.update');

Route::resource('projects', ProjectController::class)->except(['store', 'index', 'show', 'create', 'edit', 'update']);
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');

Route::resource('items', ItemController::class)->except(['store', 'index', 'show', 'create', 'edit', 'update']);
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');

Route::resource('manpower_entries', ManpowerEntryController::class);
Route::get('/manpower_entries/create', [ManpowerEntryController::class, 'create'])->name('manpower_entries.create');
Route::get('/manpower_entries', [ManpowerEntryController::class, 'index'])->name('manpower_entries.index');

Route::get('/gantt-chart', [GanttChartController::class, 'generateGanttChart'])->name('gantt_chart');
Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');

Route::resource('deliveries', DeliveryController::class)->except(['store', 'index', 'show', 'create', 'edit', 'update']);
Route::get('/deliveries/create', [DeliveryController::class, 'create'])->name('deliveries.create');
Route::get('/deliveries/{id}/edit', [DeliveryController::class, 'edit'])->name('deliveries.edit');
Route::get('/deliveries', [DeliveryController::class, 'index'])->name('deliveries.index');
Route::get('/deliveries/{id}', [DeliveryController::class, 'show'])->name('deliveries.show');
Route::put('/deliveries/{id}', [DeliveryController::class, 'update'])->name('deliveries.update');
Route::post('/deliveries', [DeliveryController::class, 'store'])->name('deliveries.store');


Route::resource('schedules', ScheduleController::class)->except(['store', 'index', 'show', 'create', 'edit', 'update']);
Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/schedules/{id}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');
Route::get('/schedules/{id}', [ScheduleController::class, 'show'])->name('schedules.show');
Route::put('/schedules/{id}', [ScheduleController::class, 'update'])->name('schedules.update');
Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');

Route::resource('daily_reports', DailyReportController::class)->except(['store', 'index', 'show', 'create', 'edit', 'update']);
Route::get('/daily_reports/create', [DailyReportController::class, 'create'])->name('daily_reports.create');
Route::get('/daily_reports', [DailyReportController::class, 'index'])->name('daily_reports.index');
Route::get('/daily_reports/{id}/edit', [DailyReportController::class, 'edit'])->name('daily_reports.edit');
Route::put('/daily_reports/{id}', [DailyReportController::class, 'update'])->name('daily_reports.update');

Route::resource('item_partners', ItemPartnerController::class)->except(['index']);
Route::get('/item_partners', [ItemPartnerController::class, 'index'])->name('item_partners.index');

Route::resource('delivery_items', DeliveryItemController::class)->except(['index']);
Route::get('/delivery_items', [DeliveryItemController::class, 'index'])->name('delivery_items.index');

Route::resource('activity_dependencies', ActivityDependencyController::class)->except(['index']);
Route::get('/activity_dependencies', [ActivityDependencyController::class, 'index'])->name('activity_dependencies.index');