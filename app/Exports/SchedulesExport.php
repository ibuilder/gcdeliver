<?php

namespace App\Exports;

use App\Models\Schedule;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class SchedulesExport
{
    public function export(): Spreadsheet
    {
        $schedules = Schedule::all()->toArray();
        
        $headings = [
            'id',
            'Name',
            'Description',
            'Start Date',
            'End Date'
        ];
        
        $data = [$headings];
        foreach ($schedules as $schedule) {
            $data[] = [
                $schedule['id'],
                $schedule['name'],
                $schedule['description'],
                $schedule['start_date'],
                $schedule['end_date']
            ];
        }

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->fromArray($data);
        
        return $spreadsheet;
    }
}
