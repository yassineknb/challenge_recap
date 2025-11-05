<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crée 10 services
        $services = Service::factory(10)->create();

        // Crée 30 réservations
        // Pour chaque réservation, on choisit un service au hasard parmi les 10 créés
        Booking::factory(30)->create([
            'service_id' => $services->random()->id
        ]);
    }
}