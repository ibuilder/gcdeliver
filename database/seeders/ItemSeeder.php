<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ItemSeeder extends Seeder
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
                Item::create([
                    'project_id' => $project->id,
                    'name' => $faker->words(3, true) . ' Item',
                    'description' => $faker->text,
                    'spec_section' => $faker->bothify('??-###'),
                    'lead_time' => $faker->numberBetween(1, 50),
                    'status' => $faker->randomElement(['ordered', 'received', 'pending', 'backordered']),
                ]);
            }
        }
    }
}