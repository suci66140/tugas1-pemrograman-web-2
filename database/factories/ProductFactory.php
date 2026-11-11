<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'code' => 'PRD-' . $this->faker->unique()->numberBetween(100, 999),
            'price' => $this->faker->numberBetween(10000, 500000),
            'stock' => $this->faker->numberBetween(5, 100),
            'category' => $this->faker->randomElement(['Elektronik', 'Pakaian', 'Makanan', 'Aksesoris']),
        ];
    }
}