<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ApplyJobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user' => User::where('role', 'worker')->inRandomOrder()->first()->id,
            'id_job' => Job::where('status', 'approve')->inRandomOrder()->first()->id,
            'status' => fake()->randomElement(['pending', 'accept', 'reject'])
        ];
    }
}
