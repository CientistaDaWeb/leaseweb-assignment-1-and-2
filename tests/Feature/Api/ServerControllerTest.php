<?php

namespace Tests\Feature\Api;

use App\Models\Memory;
use App\Models\Server;
use App\Models\User;
use Tests\TestCase;

class ServerControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_index_api_not_logged_server_controller(): void
    {
        $response = $this->getJson('/api/servers');

        $response->assertStatus(401);
    }

    public function test_index_api_server_controller(): void
    {
        $server = Server::factory()->create();
        $response = $this->actingAs($this->user)->getJson('/api/servers');

        $response->assertStatus(200);
        $response->assertJsonFragment($server->toArray());
    }

    public function test_store_api_server_controller(): void
    {
        $server = Server::factory()->make();
        $server->memories = Memory::factory(2)->create()->pluck('id');
        $response = $this->actingAs($this->user)->postJson('/api/servers', $server->toArray());

        unset($server->memories);
        $response->assertStatus(201);
        $response->assertJsonFragment($server->toArray());
    }

    public function test_update_api_server_controller(): void
    {
        $server = Server::factory()->create();
        $server->name = fake()->name;
        $server->memories = Memory::factory(2)->create()->pluck('id');
        $response = $this->actingAs($this->user)->putJson("/api/servers/{$server->id}", $server->toArray());

        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => $server->name]);
    }

    public function test_delete_api_server_controller(): void
    {
        $server = Server::factory()->create();
        $response = $this->actingAs($this->user)->deleteJson("/api/servers/{$server->id}");

        $response->assertStatus(204);
    }

    public function test_fail_create_server_controller(): void
    {
        $server = Server::factory()->make();
        $server->name = '';
        $response = $this->actingAs($this->user)->postJson('/api/servers', $server->toArray());

        $response->assertStatus(422);

        $server = Server::factory()->make();
        $server->price = -2.5;
        $response = $this->actingAs($this->user)->postJson('/api/servers', $server->toArray());

        $response->assertStatus(422);
    }

    public function test_fail_update_server_controller(): void
    {
        $server = Server::factory()->create();
        $server->name = '';
        $response = $this->actingAs($this->user)->putJson("/api/servers/{$server->id}", $server->toArray());

        $response->assertStatus(422);

        $server = Server::factory()->create();
        $server->price = -2.5;
        $response = $this->actingAs($this->user)->putJson("/api/servers/{$server->id}", $server->toArray());

        $response->assertStatus(422);
    }

    public function test_fail_duplicate_asset_id_server_controller(): void
    {
        $server = Server::factory()->create();
        $server2 = Server::factory()->make(['asset_id' => $server->asset_id]);
        $response = $this->actingAs($this->user)->postJson('/api/servers', $server2->toArray());

        $response->assertStatus(422);
    }
}
