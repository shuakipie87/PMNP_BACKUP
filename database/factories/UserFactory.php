<?php

namespace Database\Factories;

use App\Models\User;

use Illuminate\{
    Database\Eloquent\Factories\Factory,
    Support\Facades\Hash,
    Support\Str
};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current id being used by the factory.
     */
    protected static ?int $id = 1;

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
            'user_id' => $this->faker->unique()->numberBetween(1, 5000),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'two_factor_secret' => '',
            'two_factor_recovery_codes' => '',
            'phone' => $this->faker->numerify('##########'),
            'role' => function (array $attributes) {
                return static::$id++ === 1 ?? 0;
            },
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
