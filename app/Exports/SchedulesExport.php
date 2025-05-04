<?php

namespace App\Exports;

use App\Models\Schedule;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SchedulesExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;
    public function query()
    {
        return Schedule::query();
    }
    public function map($schedule): array
    {
        return [
            $schedule->id,
            $schedule->name,
            $schedule->description,
            $schedule->start_date,
            $schedule->end_date];
    }
    public function headings(): array
    {
        return [
            'id',
            'Name',
            'Description',
            'Start Date',
            'End Date'
        ];
    }
}
