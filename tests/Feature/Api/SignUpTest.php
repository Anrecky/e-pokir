<?php

namespace Tests\Feature\Api;

use App\Models\SubDistrict;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SignUpTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function test_client_can_register()
    {

        $nik = "1234567891011121314";
        $name = "Ricardo Jr. Fredelen";
        $street_name = "Jl. S. Parman No.54";
        $phone_name = "Iphone Maximum Unlimited +";
        $subDistrictName = 'Rebo';

        $response = $this->post('/api/registration', [
            'nik' => $nik,
            'name' => $name,
            'street_name' => $street_name,
            'phone_name' => $phone_name,
            'sub_district_name' => $subDistrictName
        ]);

        $response->assertSuccessful();

        $this->assertNotEmpty($response->getContent());
        $this->assertDatabaseHas('clients', [
            'name' => $name,
            'nik' => $nik,
            'phone_name' => $phone_name,
            'street_name' => $street_name
        ]);
    }
}
