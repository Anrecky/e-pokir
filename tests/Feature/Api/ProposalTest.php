<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Laravel\Sanctum\Sanctum;
use App\Models\Client;
use App\Models\User;

class ProposalTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @testdox  description
     */
    public function test_authenticated_client_can_create_proposal()
    {

        $response = $this->postJson('/api/proposal/create', [
            "title" => "abcdefg",
            "description" => "tes",
            "category" => "LAINNYA",
            "latitude" => null,
            "longitude" => null,
            "quantity" => 10.12,
            "unit" => "Kaset",
            "is_draft" => false,
            "client_id" => 2
        ], [
            "Authorization" => "Bearer 1|qyd1CLKm3zrWBzRwEdSKXlzFkDYcwGpKMfoIpgbF",
            "Content-Type" => "application/json",
            "Accept" => "application/json"
        ]);
        $response->assertCreated();
    }
}
