<?php

namespace Database\Factories;

use App\Enums\MemorySizeEnum;
use App\Enums\MemoryTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Memory>
 */
class MemoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(MemoryTypeEnum::cases())->value,
            'size' => fake()->randomElement(MemorySizeEnum::cases())->value,
        ];
    }
}
