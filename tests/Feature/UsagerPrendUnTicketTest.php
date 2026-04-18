<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Service;
use App\Models\Ticket;

class UsagerPrendUnTicketTest extends TestCase
{
    use RefreshDatabase;

    public function test_usager_peut_prendre_un_ticket_et_numero_reinitialise()
    {
        $usager = User::factory()->create(['role' => 'usager']);
        $service = Service::factory()->create(['is_active' => true]);

        // Créer un ticket d'hier pour vérifier que ça repart à 1 le nouveau jour
        Ticket::factory()->create([
            'service_id' => $service->id,
            'ticket_number' => 50,
            'created_at' => now()->subDay(),
        ]);

        $response = $this->actingAs($usager)
            ->post(route('usager.tickets.store'), [
                'service_id' => $service->id,
            ]);

        $ticket = Ticket::where('user_id', $usager->id)->first();
        
        $response->assertRedirect(route('usager.tickets.show', $ticket->id));
        
        // Assert ticket number resets to 1 because the old ticket was from yesterday
        $this->assertEquals(1, $ticket->ticket_number);
        $this->assertEquals('en_attente', $ticket->status);
    }
}
