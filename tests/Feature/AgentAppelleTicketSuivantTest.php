<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Service;
use App\Models\Counter;
use App\Models\Ticket;

class AgentAppelleTicketSuivantTest extends TestCase
{
    use RefreshDatabase;

    public function test_agent_peut_appeler_ticket_sur_son_guichet()
    {
        $agent = User::factory()->create(['role' => 'agent']);
        $service = Service::factory()->create();
        $counter = Counter::factory()->create([
            'service_id' => $service->id,
            'agent_user_id' => $agent->id,
        ]);

        $ticket = Ticket::factory()->create([
            'service_id' => $service->id,
            'status' => 'en_attente',
        ]);

        $response = $this->actingAs($agent)
            ->patch(route('agent.counters.call', $counter->id));

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $ticket->refresh();
        $this->assertEquals('appele', $ticket->status);
        $this->assertEquals($counter->id, $ticket->counter_id);
    }

    public function test_agent_ne_peut_pas_agir_sur_le_guichet_un_autre()
    {
        $agent1 = User::factory()->create(['role' => 'agent']);
        $agent2 = User::factory()->create(['role' => 'agent']);
        
        $service = Service::factory()->create();
        
        $counterAgent1 = Counter::factory()->create([
            'service_id' => $service->id,
            'agent_user_id' => $agent1->id,
        ]);

        // Agent 2 attempts to call a ticket on Agent 1's counter
        $response = $this->actingAs($agent2)
            ->patch(route('agent.counters.call', $counterAgent1->id));

        // Assuming CounterPolicy blocks this with a 403 Forbidden
        $response->assertStatus(403);
    }
}
