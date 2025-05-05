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

        protected function setUp(): void
    {
        parent::setUp();

        // Create a user and authenticate them
        $user = User::factory()->create();
        $this->actingAs($user);
    }

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
     * Check if the show user view is accessible.
     */
    public function test_show_user_view_is_accessible()
    {
        $user = User::factory()->create();
        $response = $this->get(route('users.show', $user));
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

    /**
     * Check if the edit user view is accessible.
     */
    public function test_edit_user_view_is_accessible()
    {
        $user = User::factory()->create();
        $response = $this->get(route('users.edit', $user));
        $response->assertStatus(200);
    }

    /**
     * Check if an existing user can be updated.
     */
    public function test_can_update_existing_user()
    {
        $role = Role::create(['name' => 'admin', 'description' => 'Administrator role']);
        $user = User::factory()->create(['role_id' => $role->id]);

        $updatedUserData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'newpassword123',
            'role_id' => $role->id,
        ];

        $response = $this->put(route('users.update', $user), $updatedUserData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'email' => $updatedUserData['email'],
        ]);
    }

    /**
     * Check if an existing user can be deleted.
     */
    public function test_can_delete_existing_user()
    {
        $user = User::factory()->create();
        $response = $this->delete(route('users.destroy', $user));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
