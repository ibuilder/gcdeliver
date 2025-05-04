<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $statuses = ['pending', 'in progress', 'completed'];

        for ($i = 0; $i < 3; $i++) {
            $startDate = $faker->dateTimeBetween('now', '+1 year');
            $endDate = $faker->dateTimeBetween($startDate, '+2 years');
            Project::create([
                'name' => $faker->company . ' Project',
                'description' => $faker->text,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => $faker->randomElement($statuses),
            ]);
        }
    }
}