<?php

namespace Database\Factories;

use App\Models\Counter;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket_number' => fake()->unique()->numberBetween(1, 999),
            'service_id' => Service::factory(),
            'counter_id' => null,
            'user_id' => User::factory()->state(['role' => 'usager']),
            'status' => 'en_attente',
            'called_at' => null,
            'treated_at' => null,
        ];
    }
}
