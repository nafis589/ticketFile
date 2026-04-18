<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@ticketfile.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Agent One',
            'email' => 'agent1@ticketfile.test',
            'password' => Hash::make('password'),
            'role' => 'agent',
        ]);

        User::factory()->create([
            'name' => 'Agent Two',
            'email' => 'agent2@ticketfile.test',
            'password' => Hash::make('password'),
            'role' => 'agent',
        ]);

        User::factory()->create([
            'name' => 'Usager',
            'email' => 'user@ticketfile.test',
            'password' => Hash::make('password'),
            'role' => 'usager',
        ]);
    }
}
