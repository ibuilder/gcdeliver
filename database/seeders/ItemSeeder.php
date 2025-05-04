<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Project;
use Faker\Factory as Faker;

class ItemSeeder extends Seeder
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
        $statuses = ['pending', 'ordered', 'delivered'];

        foreach ($projects as $project) {
            for ($i = 0; $i < 10; $i++) {
                Item::create([
                    'project_id' => $project->id,
                    'name' => $faker->word . ' Item',
                    'description' => $faker->text,
                    'spec_section' => $faker->word . '-' . $faker->randomNumber(3),
                    'lead_time' => $faker->numberBetween(1, 30),
                    'status' => $faker->randomElement($statuses),
                ]);
            }
        }
    }
}