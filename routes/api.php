<?php

use App\Http\Controllers\Api\ItemApiController;
use App\Http\Controllers\Api\PartnerApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\ScheduleApiController;
use App\Http\Controllers\Api\DailyReportApiController;
use App\Http\Controllers\Api\DeliveryApiController;
use App\Http\Controllers\Api\ProjectApiController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/projects', [ProjectApiController::class, 'index']);
    Route::resource('projects.deliveries', DeliveryApiController::class);
    Route::resource('projects.schedules', ScheduleApiController::class);
    Route::resource('daily-reports', DailyReportApiController::class);
    Route::resource('users', UserApiController::class);
    Route::resource('partners', PartnerApiController::class);
    Route::resource('items', ItemApiController::class);
});