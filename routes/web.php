php
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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::resource('partners', PartnerController::class);
Route::get('/partners/create', [PartnerController::class, 'create'])->name('partners.create');
Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');

Route::resource('projects', ProjectController::class);
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::resource('items', ItemController::class);
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::get('/items', [ItemController::class, 'index'])->name('items.index');

Route::resource('deliveries', DeliveryController::class);
Route::get('/deliveries/create', [DeliveryController::class, 'create'])->name('deliveries.create');
Route::get('/deliveries', [DeliveryController::class, 'index'])->name('deliveries.index');

Route::resource('schedules', ScheduleController::class);
Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');

Route::resource('daily_reports', DailyReportController::class);
Route::get('/daily_reports/create', [DailyReportController::class, 'create'])->name('daily_reports.create');
Route::get('/daily_reports', [DailyReportController::class, 'index'])->name('daily_reports.index');

Route::resource('item_partners', ItemPartnerController::class);
Route::get('/item_partners/create', [ItemPartnerController::class, 'create'])->name('item_partners.create');
Route::get('/item_partners', [ItemPartnerController::class, 'index'])->name('item_partners.index');

Route::resource('delivery_items', DeliveryItemController::class);
Route::get('/delivery_items/create', [DeliveryItemController::class, 'create'])->name('delivery_items.create');
Route::get('/delivery_items', [DeliveryItemController::class, 'index'])->name('delivery_items.index');

Route::resource('activity_dependencies', ActivityDependencyController::class);
Route::get('/activity_dependencies/create', [ActivityDependencyController::class, 'create'])->name('activity_dependencies.create');
Route::get('/activity_dependencies', [ActivityDependencyController::class, 'index'])->name('activity_dependencies.index');

Route::resource('manpower_entries', ManpowerEntryController::class);
Route::get('/manpower_entries/create', [ManpowerEntryController::class, 'create'])->name('manpower_entries.create');
Route::get('/manpower_entries', [ManpowerEntryController::class, 'index'])->name('manpower_entries.index');