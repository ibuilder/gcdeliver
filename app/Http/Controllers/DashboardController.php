<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;
use App\Models\Delivery;
use App\Models\Project;
use App\Models\Item;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DashboardController extends Controller
{   use AuthorizesRequests;


    public function index()
    {
        $this->authorize('view-dashboard');
        $totalProjects = Project::count();
        $projectsInProgress = Project::where('status', 'in_progress')->count();
        $completedProjects = Project::where('status', 'completed')->count();
        $totalDeliveries = Delivery::count();
        $totalSchedules = Schedule::count();
        $totalDailyReports = DailyReport::count();

        $summaryData = [
            'total_projects' => $totalProjects,
            'projects_in_progress' => $projectsInProgress,
            'completed_projects' => $completedProjects,
            'total_deliveries' => $totalDeliveries,
            'total_schedules' => $totalSchedules,
            'total_daily_reports' => $totalDailyReports,
        ];

        $now = Carbon::now();
        $nextSevenDays = Carbon::now()->addDays(7);

        $criticalTasks = Schedule::where(function ($query) use ($now, $nextSevenDays) {
            $query->whereBetween('start_date', [$now, $nextSevenDays])
                ->orWhere('end_date', '<', $now);
        })->get();
        
        
        $upcomingDeliveries = Delivery::whereBetween('date', [$now, $nextSevenDays])->get();
        
        $lateItems = Item::where('status', 'pending')
        ->where('lead_time', '<', $now)
        ->get();

        return view('dashboard', [
            'summary_data' => $summaryData, 
            'critical_tasks' => $criticalTasks,
            'upcoming_deliveries' => $upcomingDeliveries,
            'late_items' => $lateItems,
        ]);
    }
}