<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(2),
            'duration' => $this->faker->randomElement([30, 60, 90, 120]),
            'price' => $this->faker->randomFloat(2, 20, 200),
            // L'image sera null par défaut, on peut les ajouter manuellement
        ];
    }
}