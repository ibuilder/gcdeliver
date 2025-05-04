<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_projects_index_view_is_accessible(): void
    {
        $response = $this->get(route('projects.index'));
        $response->assertStatus(200);
    }

    public function test_create_project_view_is_accessible(): void
    {
        $response = $this->get(route('projects.create'));
        $response->assertStatus(200);
    }

    public function test_can_create_new_project(): void
    {
        // Create a partner first
        $partnerData = [
          'name' => 'Test Partner',
          'contact_information' => 'test@partner.com'
        ];

        $partner = \App\Models\Partner::create($partnerData);

        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('+1 day'));

        $projectData = [
            'name' => 'Test Project',
            'description' => 'This is a test project',
            'partner_id' => $partner->id,
            'start_date' => $today,
            'end_date' => $tomorrow
        ];
        
        $response = $this->post(route('projects.store'), $projectData);
        $response->assertRedirect(route('projects.index'));
        $this->assertDatabaseHas('projects', [
            'name' => $projectData['name'],
            'description' => $projectData['description'],
        ]);
    }

    public function test_project_creation_validation(): void
    {
        $partnerData = [
            'name' => 'Test Partner',
            'contact_information' => 'test@partner.com'
          ];
        $partner = \App\Models\Partner::create($partnerData);
        // Test with empty name
        $projectData = [
            'name' => '',
            'description' => 'This is a test project',
            'start_date' => '2024-01-01',
            'partner_id' => 1
        ];

        $response = $this->post(route('projects.store'), $projectData);
        $response->assertSessionHasErrors(['name']);

        //Test with empty description
        $projectData = [
          'name' => 'Test Project',
          'description' => '',
          'start_date' => '2024-01-01',
          'partner_id' => 1
        ];
        $response = $this->post(route('projects.store'), $projectData);
        $response->assertSessionHasErrors(['description']);

        //Test with empty partner id
        $projectData = [
            'name' => 'Test Project',
            'start_date' => '2024-01-01',
            'description' => 'This is a test project',
            'end_date' => '2024-01-02',
            'partner_id' => ''
        ];
        $response = $this->post(route('projects.store'), $projectData);
        $response->assertSessionHasErrors(['partner_id']);
    }
}
