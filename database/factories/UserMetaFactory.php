<?php

namespace Database\Factories;

use App\Models\UserMeta;

use Illuminate\{
    Database\Eloquent\Factories\Factory,
    Support\Facades\Hash,
    Support\Str
};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserMetaFactory extends Factory
{
    /**
     * The current id being used by the factory.
     */
    protected static ?int $id = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function (array $attributes) {
                return static::$id++;
            },
            'gender' => 1,
            'region_id' => 1,
            'organizational_id' => 1,
            'address1' => $this->faker->secondaryAddress(),
            'address2' => $this->faker->streetAddress(),
            'phone' => $this->faker->phoneNumber()
        ];
    }
}
