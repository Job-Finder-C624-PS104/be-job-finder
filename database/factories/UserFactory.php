<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = fake()->randomElement(['worker', 'hire', 'admin']);

        return [
            'name' => $role === 'hire'? fake()->company() : fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('Password123!'),
            'remember_token' => Str::random(10),
            'phone' => fake()->unique()->regexify('(?\0)[2-9][0-9]{7,12}'),
            'role' => $role,
            'description' => $role == 'hire' ? "<h3>Tentang Kami</h3> <p>" . $this->faker->paragraph(3) . "</p> <h3>Visi & Misi</h3> <p>" . $this->faker->sentence(10) . "</p>" : null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
