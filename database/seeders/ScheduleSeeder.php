<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\Project;
use Faker\Factory as Faker;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $projects = Project::all();

        foreach ($projects as $project) {
            for ($i = 0; $i < 3; $i++) {
                $startDate = $faker->dateTimeBetween('now', '+2 years');
                $endDate = $faker->dateTimeBetween($startDate, '+2 years');
                $schedule = Schedule::create([
                    'project_id' => $project->id,
                    'task_name' => $faker->sentence,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'duration' => $faker->numberBetween(1, 5),
                    'progress' => $faker->numberBetween(0, 100),
                ]);

                $dependencies = Schedule::where('project_id', $project->id)
                    ->where('id', '!=', $schedule->id)
                    ->inRandomOrder()
                    ->take($faker->numberBetween(1, 2))
                    ->pluck('id');

                $schedule->dependencies()->attach($dependencies);
            }
        }
    }
}