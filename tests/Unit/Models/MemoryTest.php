<?php

namespace Tests\Unit\Models;

use App\Enums\MemorySizeEnum;
use App\Enums\MemoryTypeEnum;
use App\Models\Memory;
use Tests\TestCase;

class MemoryTest extends TestCase
{

    public function test_create_memory()
    {
        $memory = Memory::factory()->create();
        $this->assertDatabaseHas(app(Memory::class)->getTable(), $memory->toArray());
    }

    public function test_update_memory()
    {
        $memory = Memory::factory()->create();

        $type = fake()->randomElement(MemoryTypeEnum::cases())->value;
        $size = fake()->randomElement(MemorySizeEnum::cases())->value;
        $memory->update([
            'type' => $type,
            'size' => $size,
        ]);

        $this->assertEquals($type, $memory->type);
        $this->assertEquals($size, $memory->size);
    }

    public function testDeleteMemory()
    {
        $memory = Memory::factory()->create();
        $memory->delete();

        $this->assertSoftDeleted($memory);
    }

}
