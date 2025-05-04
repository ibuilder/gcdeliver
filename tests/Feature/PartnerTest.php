<?php

namespace Tests\Feature;

use App\Models\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class PartnerTest extends TestCase
{
    use RefreshDatabase;

    public function test_partners_index_view_is_accessible(): void
    {
        $response = $this->get(route('partners.index'));

        $response->assertOk();
    }

    public function test_create_partner_view_is_accessible(): void
    {
        $response = $this->get(route('partners.create'));

        $response->assertOk();
    }

    public function test_can_create_new_partner(): void
    {
        $partnerData = [
            'name' => 'Test Partner',
            'contact_information' => 'test@partner.com',
        ];

        $response = $this->post(route('partners.store'), $partnerData);

        $response->assertRedirect(route('partners.index'));

        $this->assertDatabaseHas('partners', $partnerData);
    }

    public function test_partner_creation_validation(): void
    {
        $partnerData = [
            'name' => '',
            'contact_information' => '',
        ];

        $response = $this->post(route('partners.store'), $partnerData);
        $response->assertSessionHasErrors(['name', 'contact_information']);

        $partnerData = [
            'name' => str_repeat('a', 256), // Over 255 chars
            'contact_information' => 'test@partner.com',
        ];
        $response = $this->post(route('partners.store'), $partnerData);
        $response->assertSessionHasErrors(['name']);

        $partnerData = [
            'name' => 'Test Partner',
            'contact_information' => str_repeat('a', 10000), // Over max length
        ];
        $response = $this->post(route('partners.store'), $partnerData);
        $response->assertSessionHasErrors(['contact_information']);
        
        $this->assertDatabaseMissing('partners', [
            'name' => str_repeat('a', 256),
        ]);
    }
}
