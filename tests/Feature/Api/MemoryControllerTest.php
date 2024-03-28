<?php

namespace Tests\Feature\Api;

use App\Enums\MemorySizeEnum;
use App\Enums\MemoryTypeEnum;
use App\Models\Memory;
use App\Models\User;
use Tests\TestCase;

class MemoryControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_index_api_not_logged_memory_controller(): void
    {
        $response = $this->getJson('/api/memories');

        $response->assertStatus(401);
    }

    public function test_index_api_memory_controller(): void
    {
        $memory = Memory::factory()->create();
        $response = $this->actingAs($this->user)->getJson('/api/memories');

        $response->assertStatus(200);
        $response->assertJsonFragment($memory->toArray());
    }

    public function test_store_api_memory_controller(): void
    {
        $memory = Memory::factory()->make();
        $response = $this->actingAs($this->user)->postJson('/api/memories', $memory->toArray());

        $response->assertStatus(201);
        $response->assertJsonFragment($memory->toArray());
    }

    public function test_update_api_memory_controller(): void
    {
        $memory = Memory::factory()->create();
        $newType = fake()->randomElement(MemoryTypeEnum::cases())->value;
        $newSize = fake()->randomElement(MemorySizeEnum::cases())->value;
        $response = $this->actingAs($this->user)->putJson("/api/memories/{$memory->id}", [
            'type' => $newType,
            'size' => $newSize
        ]);

        $response->assertStatus(200);
        $response->assertJsonFragment(['type' => $newType, 'size' => $newSize]);
    }

    public function test_delete_api_memory_controller(): void
    {
        $memory = Memory::factory()->create();
        $response = $this->actingAs($this->user)->deleteJson("/api/memories/{$memory->id}");

        $response->assertStatus(204);
    }

    public function teste_fail_create_memory_controller(): void
    {
        $memory = Memory::factory()->make();
        $memory->type = '';
        $memory->size = '127';
        $response = $this->actingAs($this->user)->postJson('/api/memories', $memory->toArray());

        $response->assertStatus(422);
    }

    public function teste_fail_update_memory_controller(): void
    {
        $memory = Memory::factory()->create();
        $newType = fake()->word();
        $newSize = '';
        $response = $this->actingAs($this->user)->putJson("/api/memories/{$memory->id}", [
            'type' => $newType,
            'size' => $newSize
        ]);

        $response->assertStatus(422);
    }
}
