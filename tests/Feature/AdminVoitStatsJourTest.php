<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Ticket;
use Carbon\Carbon;

class AdminVoitStatsJourTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_voit_stats_du_jour()
    {
        $admin = User::factory()->create(['role' => 'admin']);

        // 2 Tickets traités aujourd'hui avec 10 minutes d'attente
        Ticket::factory()->count(2)->create([
            'status' => 'traite',
            'created_at' => Carbon::today()->setHour(9),
            'called_at' => Carbon::today()->setHour(9)->addMinutes(10),
        ]);

        // 1 Ticket annulé aujourd'hui
        Ticket::factory()->create([
            'status' => 'annule',
            'created_at' => Carbon::today()->setHour(10),
        ]);

        // 1 Ticket traité hier (doit être ignoré)
        Ticket::factory()->create([
            'status' => 'traite',
            'created_at' => Carbon::yesterday(),
            'called_at' => Carbon::yesterday()->addMinutes(15),
        ]);

        $response = $this->actingAs($admin)
            ->get(route('admin.dashboard'));

        $response->assertOk();
        $response->assertViewHas('stats');
        
        $stats = $response->viewData('stats');
        
        $this->assertEquals(2, $stats['tickets_traites']);
        $this->assertEquals(1, $stats['tickets_annules']);
        $this->assertEquals(10.0, $stats['temps_moyen_attente_min']);
    }
}
