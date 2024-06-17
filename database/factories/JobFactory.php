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
            'salarymin' => fake()->numberBetween(1000000, 10000000),
            'salarymax' => fake()->numberBetween(1000000, 10000000),
            'type' => fake()->randomElement(['Full Time', 'Part Time', 'Remote']),
            'id_user' => User::all()->random()->id
        ];
    }
}
