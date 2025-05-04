<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'General Contractor',
            'description' => 'Manages the overall construction project and subcontractors.',
        ]);

        Role::create([
            'name' => 'Owner',
            'description' => 'The client who owns the project and makes key decisions.',
        ]);

        Role::create([
            'name' => 'Architect',
            'description' => 'Designs the building and ensures aesthetic and functional requirements are met.',
        ]);

        Role::create([
            'name' => 'Engineer',
            'description' => 'Ensures structural integrity and compliance with engineering standards.',
        ]);
    }
}