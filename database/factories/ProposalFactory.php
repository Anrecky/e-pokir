<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proposal>
 */
class ProposalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'description' => Arr::random([fake()->realText(100), null]),
            'category' => Arr::random(['BANSOS', 'SAPRAS', 'JALAN', 'BANGUNAN', 'SALURAN', 'LAINNYA']),
            'address' => Arr::random([fake()->address(), null]),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'quantity' => rand(1, 10000),
            'unit' => Str::random(5),
            'is_draft' => rand(0, 1),
            'client_id' => rand(1, 1111)
        ];
    }
}
