<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DailyReport;
use App\Models\Project;
use Faker\Factory as Faker;

class DailyReportSeeder extends Seeder
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
                $reportDate = $faker->dateTimeBetween('now', '+1 year');
                $weatherConditions = $faker->randomElement(['Sunny', 'Cloudy', 'Rainy', 'Windy']);
                $notes = $faker->text;

                DailyReport::create([
                    'project_id' => $project->id,
                    'report_date' => $reportDate,
                    'weather_conditions' => $weatherConditions,
                    'notes' => $notes,
                ]);
            }
        }
    }
}