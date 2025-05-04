php
<?php

namespace App\Http\Controllers;

use App\Exports\SchedulesExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class GanttChartController extends Controller
{
    public function generateGanttChart(): BinaryFileResponse
    {
        return Excel::download(new SchedulesExport, 'GanttChart.xlsx');
    }
}