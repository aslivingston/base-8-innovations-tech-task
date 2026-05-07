<?php

namespace Database\Factories;

use App\Models\Gradient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Gradient>
 */
class GradientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'colour_start' => '#ff0000',
            'colour_end' => '#0000ff',
            'angle' => 90,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
