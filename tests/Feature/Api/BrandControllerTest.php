<?php

namespace Tests\Feature\Api;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Brand;
use App\Models\User;
use Tests\TestCase;

class BrandControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_index_api_not_logged_brand_controller(): void
    {
        $response = $this->getJson('/api/brands');

        $response->assertStatus(401);
    }

    public function test_index_api_brand_controller(): void
    {

        $brand = Brand::factory()->create();
        $response = $this->actingAs($this->user)->getJson('/api/brands');

        $response->assertStatus(200);
        $response->assertJsonFragment($brand->toArray());
    }

    public function test_store_api_brand_controller(): void
    {
        $brand = Brand::factory()->make();
        $response = $this->actingAs($this->user)->postJson('/api/brands', $brand->toArray());

        $response->assertStatus(201);
        $response->assertJsonFragment($brand->toArray());
    }

    public function test_update_api_brand_controller(): void
    {
        $brand = Brand::factory()->create();
        $newName = fake()->company;
        $response = $this->actingAs($this->user)->putJson("/api/brands/{$brand->id}", ['name' => $newName]);

        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => $newName]);
    }

    public function test_delete_api_brand_controller(): void
    {
        $brand = Brand::factory()->create();
        $response = $this->actingAs($this->user)->deleteJson("/api/brands/{$brand->id}");

        $response->assertStatus(204);
    }

    public function test_fail_create_brand_controller(): void
    {
        $brand = Brand::factory()->make();
        $brand->name = '';
        $response = $this->actingAs($this->user)->postJson('/api/brands', $brand->toArray());

        $response->assertStatus(422);
    }

    public function test_fail_update_brand_controller(): void
    {
        $brand = Brand::factory()->create();
        $response = $this->actingAs($this->user)->putJson("/api/brands/{$brand->id}", ['name' => '']);

        $response->assertStatus(422);
    }
}
