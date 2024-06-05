<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'company' => fake()->company(),
            'location' => fake()->country(),
            'description' => fake()->paragraph(),
            'salary' => fake()->numberBetween(1000000, 10000000),
            'date' => fake()->date(),
            'id_user' => User::all()->random()->id
        ];
    }
}
