<?php

namespace Database\Seeders;

use App\Models\Counter;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class CounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = Service::all();
        $agents = User::where('role', 'agent')->get();

        foreach ($services as $index => $service) {
            // Assigning matching agents randomly or sequentially if needed, 
            // but just keeping it simple for test purposes.
            // Guichet 1 pour ce service
            Counter::create([
                'name' => 'Guichet 1 - ' . $service->name,
                'service_id' => $service->id,
                'agent_user_id' => $agents[$index % count($agents)]->id,
            ]);

            // Guichet 2 pour ce service (sans agent assigné)
            Counter::create([
                'name' => 'Guichet 2 - ' . $service->name,
                'service_id' => $service->id,
                'agent_user_id' => null,
            ]);
        }
    }
}
