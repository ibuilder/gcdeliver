<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;
use Faker\Factory as Faker;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            Partner::create([
                'name' => $faker->company,
                'contact_person' => $faker->name,
                'contact_email' => $faker->unique()->safeEmail,
                'contact_phone' => $faker->phoneNumber,
            ]);
        }
    }
}