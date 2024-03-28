<?php

namespace Tests\Unit\Models;

use App\Models\Server;
use Tests\TestCase;

class ServerTest extends TestCase
{
    public function test_create_server()
    {
        $server = Server::factory()->create();
        $this->assertDatabaseHas('servers', $server->toArray());
    }

    public function test_update_server()
    {
        $server = Server::factory()->create();
        $server->update(['name' => 'New Name']);
        $this->assertDatabaseHas('servers', ['name' => 'New Name']);
    }

    public function test_delete_server()
    {
        $server = Server::factory()->create();
        $server->delete();
        $this->assertSoftDeleted($server);
    }

}
