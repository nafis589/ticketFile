<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Consultation',
                'description' => 'Service de consultation générale',
                'is_active' => true,
            ],
            [
                'name' => 'Paiement',
                'description' => 'Service des paiements et encaissements',
                'is_active' => true,
            ],
            [
                'name' => 'Renseignement',
                'description' => 'Service des informations générales',
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
