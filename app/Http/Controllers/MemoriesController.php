<?php

namespace App\Http\Controllers;

use App\Enums\MemorySizeEnum;
use App\Enums\MemoryTypeEnum;
use App\Http\Requests\StoreMemoryRequest;
use App\Models\Memory;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class MemoriesController extends Controller
{
    public function index()
    {
        $memories = Memory::query()
            ->orderBy('type')
            ->orderBy('size')
            ->paginate(10);
        return Inertia::render('Memories/Index', [
            'memories' => $memories
        ]);
    }

    public function create()
    {
        $types = MemoryTypeEnum::cases();
        $sizes = MemorySizeEnum::cases();
        return Inertia::render('Memories/Create', [
            'types' => $types,
            'sizes' => $sizes,
        ]);
    }

    public function store(StoreMemoryRequest $request)
    {
        Memory::query()
            ->create($request->all());

        return Redirect::route('memories')->with('success', 'Memory created.');
    }

    public function edit(Memory $memory)
    {
        $types = MemoryTypeEnum::cases();
        $sizes = MemorySizeEnum::cases();
        return Inertia::render('Memories/Edit', [
            'memory' => [
                'id' => $memory->id,
                'size' => $memory->size,
                'type' => $memory->type,
                'deleted_at' => $memory->deleted_at,
            ],
            'types' => $types,
            'sizes' => $sizes,
        ]);
    }

    public function update(StoreMemoryRequest $request, Memory $memory)
    {
        $memory->update($request->all());

        return Redirect::back()->with('success', 'Memory updated.');
    }

    public function destroy(Memory $memory)
    {
        $memory->delete();

        return Redirect::route('memories')->with('success', 'Memory deleted.');
    }

    public function restore(Memory $memory)
    {
        $memory->restore();

        return Redirect::route('memories')->with('success', 'Memory restored.');
    }
}
