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
        return [
            'firstname' => fake()->firstName(),   // Génère un prénom
            'lastname' => fake()->lastName(),     // Génère un nom de famille
            'gender' => $this->faker->randomElement(['male', 'female']),
            'email' => fake()->unique()->safeEmail(),
            'address' => $this->faker->address(), // Génère une adresse réaliste
            'phone' => '229' . $this->faker->numberBetween(9700000000, 9999999999), // Numéro au format béninois
            'birthdate' => $this->faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'), // Date au format YYYY-MM-DD
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
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
