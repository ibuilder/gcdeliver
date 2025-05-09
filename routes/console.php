<?php

use Illuminate\Foundation\Inspire;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

// Inspiration Quote
Artisan::command('inspire', function () {
    $this->comment(Inspire::quote());
})->purpose('Display an inspiring quote');

// Project Management Commands
Artisan::command('project:cleanup', function () {
    $this->info('Starting project cleanup...');
    // Add cleanup logic here
})->purpose('Clean up old project files and temporary data');

Artisan::command('project:statistics', function () {
    $this->info('Generating project statistics...');
    // Add statistics generation logic
})->purpose('Generate project statistics report');

// User Management Commands
Artisan::command('users:sync-permissions', function () {
    $this->info('Syncing user permissions...');
    // Add permission sync logic
})->purpose('Synchronize user permissions with roles');

Artisan::command('users:inactive-cleanup {days=90}', function ($days) {
    $this->info("Cleaning up users inactive for {$days} days...");
    // Add inactive user cleanup logic
})->purpose('Clean up inactive user accounts');

// File Management Commands
Artisan::command('storage:optimize', function () {
    $this->info('Optimizing storage...');
    // Add storage optimization logic
})->purpose('Optimize storage usage and clean temporary files');

// Maintenance Commands
Artisan::command('system:health-check', function () {
    $this->info('Performing system health check...');
    // Add health check logic
})->purpose('Run system health check and generate report');

Artisan::command('logs:cleanup {--days=7}', function () {
    $this->info('Cleaning up old log files...');
    // Add log cleanup logic
})->purpose('Clean up old log files');

// Notification Commands
Artisan::command('notifications:prune {--days=30}', function () {
    $this->info('Pruning old notifications...');
    // Add notification cleanup logic
})->purpose('Remove old notifications from the database');

// Schedule Management
Artisan::command('schedule:list', function () {
    $this->info('Listing all scheduled tasks...');
    // Add schedule listing logic
})->purpose('List all scheduled tasks');

// Development Helper Commands
if (app()->environment('local', 'testing')) {
    Artisan::command('dev:seed-test-data', function () {
        $this->info('Seeding test data...');
        // Add test data seeding logic
    })->purpose('Seed test data for development');

    Artisan::command('dev:clear-cache', function () {
        $this->call('cache:clear');
        $this->call('view:clear');
        $this->call('config:clear');
        $this->call('route:clear');
        $this->info('All caches cleared successfully.');
    })->purpose('Clear all application caches');
}
