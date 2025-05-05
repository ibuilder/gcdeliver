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
        $roles = [
            [
                'name' => 'admin',
                'description' => 'Administrator of the system.',
            ],
            [
                'name' => 'manager',
                'description' => 'Manager of the projects.',
            ],
            [
                'name' => 'General Contractor',
                'description' => 'Manages the overall construction project and subcontractors.',
            ],
            [
                'name' => 'Owner',
                'description' => 'The client who owns the project and makes key decisions.',
            ],
            [
                'name' => 'Architect',
                'description' => 'Designs the building and ensures aesthetic and functional requirements are met.',
            ],
            [
                'name' => 'Engineer',
                'description' => 'Ensures structural integrity and compliance with engineering standards.',
            ],
        ];

        foreach ($roles as $roleData) {
            $this->createRoleIfNotExists($roleData);
        }
    }

    /**
     * Creates a role if it does not already exist.
     *
     * @param array $roleData
     * @return void
     */
    private function createRoleIfNotExists(array $roleData): void
    {
        Role::firstOrCreate(
            ['name' => $roleData['name']],
            ['description' => $roleData['description']]
        );
    }
}