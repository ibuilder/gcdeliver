<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;

class UserTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Check if the users index view is accessible.
     */
    public function test_users_index_view_is_accessible()
    {
        $response = $this->get(route('users.index'));
        $response->assertStatus(200);
    }

    /**
     * Check if the create user view is accessible.
     */
    public function test_create_user_view_is_accessible()
    {
        $response = $this->get(route('users.create'));
        $response->assertStatus(200);
    }

    /**
     * Check if a new user can be created using the store method.
     */
    public function test_can_create_new_user()
    {
        Role::create(['name' => 'admin', 'description' => 'Administrator role']);

        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password123',
            'role_id' => Role::first()->id,
        ];

        $response = $this->post(route('users.store'), $userData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'email' => $userData['email'],
        ]);
    }

    /**
     * Check if the validation when creating a new user is working
     */
    public function test_user_creation_validation()
    {
        Role::create(['name' => 'admin', 'description' => 'Administrator role']);

        $userData = [
            'name' => '',
            'email' => '',
            'password' => '',
            'role_id' => '',
        ];

        $response = $this->post(route('users.store'), $userData);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'email', 'password', 'role_id']);
    }
}
