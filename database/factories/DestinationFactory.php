<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { $filePath = storage_path('app\public\images\destinations');
        $photoPaths = [
            '40e4acc4a00645287809a42024faaa20.png',
            '1333b71b1ce33eb5ff8738f3692bf4f3.png',
            'de8c37d09a6a4be82e2b7f09b62e64a8.png',
        ];

        return [
            'user_id' => fake()->randomDigitNotZero(),
            'title' => $this->faker->sentence(3), 
            'description' => $this->faker->paragraph(3), 
            'location' => $this->faker->city . ', ' . $this->faker->state, 
            'photo_path' => fake()->randomElement($photoPaths),
            'estimated_price' => $this->faker->randomFloat(2, 50, 500),
            'approval_status' => $this->faker->boolean(80)
        ];
    }
}
