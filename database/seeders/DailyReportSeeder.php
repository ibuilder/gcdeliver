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
            for ($i = 0; $i < 10; $i++) {
                DailyReport::create([
                    'project_id' => $project->id,
                    'report_date' => $faker->dateTimeBetween('-1 month', 'now'),
                    'weather_conditions' => $faker->randomElement(['Sunny', 'Cloudy', 'Rainy', 'Windy']),
                    'notes' => $faker->optional()->text,
                ]);
            }
        }
    }
}