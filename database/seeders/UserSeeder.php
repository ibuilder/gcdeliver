<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create the admin user
        $adminRole = DB::table('roles')->where('name', 'admin')->first();
        if ($adminRole) {
            User::firstOrCreate(
                ['email' => 'admin@example.com'], // Find by email
                [
                    'role_id' => $adminRole->id,
                    'name' => 'Admin User',
                    'password' => Hash::make('adminpassword'),
                ]
            );
        }



        

    }
}