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
            for ($i = 0; $i < 10; $i++) {
                $startDate = $faker->dateTimeBetween('now', '+1 year');
                $endDate = $faker->dateTimeBetween($startDate, '+1 year');
                $duration = $faker->numberBetween(1, 10);
                Schedule::create([
                    'project_id' => $project->id,
                    'task_name' => $faker->sentence(3),
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'duration' => $duration,
                    'progress' => $faker->numberBetween(0, 100),
                ]);
            }
        }
    }
}