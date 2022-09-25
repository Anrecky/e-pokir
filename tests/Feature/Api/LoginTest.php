<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\SubDistrict;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_login_existing_client()
    {

        $sd = SubDistrict::find(15);

        $client = new Client;
        $client->nik = '1213014512958908';
        $client->name = 'Riadi Jonathan';
        $client->street_name = 'Jln. Ahmad Yani No. 15';
        $client->subDistrict()->associate($sd);
        $client->save();


        $response = $this->post('/api/sanctum/token', [
            'nik' => $client->nik,
            'phone_name' => 'Iphone 14 Pro'
        ]);

        $response->assertSuccessful();

        $this->assertNotEmpty($response->getContent());
        $this->assertDatabaseHas('personal_access_tokens', [
            'name' => 'Iphone 14 Pro',
            'tokenable_type' => Client::class,
            'tokenable_id' => $client->id
        ]);
    }
}
