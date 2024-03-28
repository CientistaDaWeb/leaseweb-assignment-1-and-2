<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Server>
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_id' => Brand::factory()->create()->id,
            'asset_id' => fake()->unique()->randomNumber(5),
            'name' => fake()->name,
            'price' => fake()->randomFloat(2, 100, 1000),
        ];
    }
}
