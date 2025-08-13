<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'for_who' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'discount_price' => $this->faker->randomFloat(2, 0, 100),
            'is_discount' => $this->faker->boolean(),
            'is_active' => $this->faker->boolean(),
            'created_at' => now()
        ];
    }
}
