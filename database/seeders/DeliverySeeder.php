<?php

namespace Database\Seeders;

use App\Models\Delivery;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $projects = Project::all();

        foreach ($projects as $project) {
            for ($i = 0; $i < 3; $i++) {
                $date = $faker->dateTimeBetween('now', '+1 year');
                $statusOptions = ['today', 'done', 'pending', 'canceled'];

                Delivery::create([
                    'project_id' => $project->id,
                    'title' => $faker->text,
                    'date' => $date,
                    'location' => $faker->streetAddress,
                    'unload_duration' => $faker->numberBetween(1, 5),
                    'time_slot' => $faker->time('h:i A') . ' - ' . $faker->time('h:i A'),
                    'status' => $faker->randomElement($statusOptions),
                    'notes' => $faker->text,
                ]);
            }
        }
    }
}