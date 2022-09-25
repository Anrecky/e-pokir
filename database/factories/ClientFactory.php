<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'nik' => fake()->regexify('^[0-9]{16,20}$'),
            'phone_name' => fake()->company(),
            'street_name' => fake()->streetName(),
            'sub_district_id' => rand(1, 81)
        ];
    }
}
