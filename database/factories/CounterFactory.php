<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Counter>
 */
class CounterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Guichet ' . fake()->unique()->numberBetween(1, 100),
            'service_id' => Service::factory(),
            'agent_user_id' => User::factory()->state(['role' => 'agent']),
        ];
    }
}
