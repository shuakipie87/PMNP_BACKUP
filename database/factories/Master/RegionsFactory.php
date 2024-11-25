<?php

namespace Database\Factories\Master;

use App\Models\UserMeta;

use Illuminate\{
    Database\Eloquent\Factories\Factory,
    Support\Facades\Hash,
    Support\Str
};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class RegionsFactory extends Factory
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
        return [];
    }
}
