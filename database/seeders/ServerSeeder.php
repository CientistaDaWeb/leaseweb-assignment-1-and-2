<?php

namespace Database\Seeders;

use App\Models\Memory;
use App\Models\Server;
use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Server::factory(10)
            ->hasAttached(
                Memory::factory()->count(2)
            )
            ->create();
    }
}
