<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'service_id' => Service::factory(), // Crée un service si non fourni
            'date' => $this->faker->dateTimeBetween('+1 day', '+1 month')->format('Y-m-d'),
            'time' => $this->faker->randomElement(['09:00', '10:00', '11:00', '14:00', '15:00']),
            'status' => $this->faker->randomElement(['pending', 'confirmed']),
        ];
    }
}