<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Delivery;
use App\Models\Project;
use Faker\Factory as Faker;

class DeliverySeeder extends Seeder
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
        $locations = ['Laydown Area #1', 'Laydown Area #2', 'Lower Bowl Staging Area'];
        $timeSlots = ['6:00 AM - 8:00 AM', '8:00 AM - 10:00 AM', '10:00 AM - 12:00 PM', '12:00 PM - 2:00 PM', '2:00 PM - 4:00 PM', '4:00 PM - 6:00 PM'];
        $statuses = ['projected', 'confirmed', 'today'];

        foreach ($projects as $project) {
            for ($i = 0; $i < 10; $i++) {
                Delivery::create([
                    'project_id' => $project->id,
                    'title' => $faker->sentence(3),
                    'date' => $faker->dateTimeBetween('now', '+1 month'),
                    'unload_duration' => $faker->numberBetween(1, 5),
                    'location' => $faker->randomElement($locations),
                    'time_slot' => $faker->randomElement($timeSlots),
                    'status' => $faker->randomElement($statuses),
                    'notes' => $faker->optional()->text,
                ]);
            }
        }
    }
}