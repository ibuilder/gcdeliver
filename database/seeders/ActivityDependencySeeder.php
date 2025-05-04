<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\ActivityDependency;

class ActivityDependencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedules = Schedule::all();

        foreach ($schedules as $schedule) {
            $dependencyCount = rand(0, min(3, $schedules->count() - 1));

            if ($dependencyCount > 0) {
                $availableDependencies = $schedules->where('id', '!=', $schedule->id)->pluck('id')->toArray();

                if(!empty($availableDependencies)){
                    $selectedDependencies = array_rand($availableDependencies, $dependencyCount);
                
                    if (!is_array($selectedDependencies)) {
                        $selectedDependencies = [$selectedDependencies];
                    }
    
                    foreach ($selectedDependencies as $dependencyIndex) {
                        ActivityDependency::create([
                            'schedule_id' => $schedule->id,
                            'dependency_id' => $availableDependencies[$dependencyIndex],
                        ]);
                    }
                }
            }
        }
    }
}