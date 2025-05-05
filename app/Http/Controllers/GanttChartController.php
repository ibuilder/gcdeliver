<?php

namespace App\Http\Controllers;

use App\Exports\SchedulesExport;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Storage;

class GanttChartController extends Controller
{
    public function generateGanttChart(): StreamedResponse
    {
        $schedulesExport = new SchedulesExport();
        $spreadsheet = $schedulesExport->export();

        $writer = new Xlsx($spreadsheet);
        $fileName = 'GanttChart.xlsx';
        $filePath = 'public/exports/' . $fileName;

        Storage::put($filePath, ''); // Create an empty file first
        $writer->save(storage_path('app/' . $filePath));
        
        return Storage::download($filePath, $fileName, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }
}