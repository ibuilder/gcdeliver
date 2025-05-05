<?php
 
namespace App\Console;
 
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
 
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.  
     */
    protected function schedule(Schedule $schedule): void
    {
        // Example of scheduling a task using a closure.
        $schedule->call(function () {
            \Log::info('Scheduled task executed at: ' . now());
            // You can add any task here, for example, sending a report or cleaning up old data.
        })->dailyAt('03:00'); // Run daily at 3 AM.
 
        // You can uncomment and use this example if you have custom artisan commands.
        // $schedule->command('your:custom-command')->daily();
    }
 
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
    }
}