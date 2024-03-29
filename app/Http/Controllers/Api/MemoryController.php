<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemoryRequest;
use App\Models\Memory;
use Illuminate\Http\Request;

class MemoryController extends Controller
{
    public function index()
    {
        $page = request()->input('page', 20);
        return Memory::query()->paginate($page);
    }

    public function show(Memory $memory)
    {
        return response()->json($memory);
    }

    public function store(StoreMemoryRequest $memory)
    {
        $memory = Memory::create($memory->all());

        return response()->json($memory, 201);
    }

    public function update(StoreMemoryRequest $request, Memory $memory)
    {
        $memory->update($request->all());

        return response()->json($memory);
    }

    public function destroy(Memory $memory)
    {
        $memory->delete();

        return response()->json(null, 204);
    }
}
