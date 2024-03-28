<?php

namespace Tests\Unit\Models;

use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BrandTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_brand()
    {
        $brand = Brand::factory()->create();
        $this->assertDatabaseHas(app(Brand::class)->getTable(), $brand->toArray());
    }

    public function test_update_brand()
    {
        $brand = Brand::factory()->create();

        $newName = fake()->company;
        $brand->update(['name' => $newName]);

        $this->assertEquals($newName, $brand->name);
    }

    public function test_delete_brand()
    {
        $brand = Brand::factory()->create();

        $brand->delete();

        $this->assertSoftDeleted($brand);
    }

}
