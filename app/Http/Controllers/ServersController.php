<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServerRequest;
use App\Models\Brand;
use App\Models\Memory;
use App\Models\Server;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ServersController extends Controller
{
    public function index()
    {
        $servers = Server::query()
            ->orderBy('asset_id')
            ->paginate(10);
        return Inertia::render('Servers/Index', [
            'servers' => $servers
        ]);
    }

    public function create()
    {
        $brands = Brand::query()
            ->select('id', 'name')
            ->orderBy('name')
            ->get()
            ->toArray();

        $memories = Memory::query()
            ->select('id', 'size', 'type')
            ->orderBy('type')
            ->orderBy('size')
            ->get()
            ->toArray();
        return Inertia::render('Servers/Create', [
            'brands' => $brands,
            'memories' => $memories
        ]);
    }

    public function store(StoreServerRequest $request)
    {
        $server = Server::query()
            ->create($request->all());

        $server->memories()->sync($request->input('memories'));

        return Redirect::route('servers')->with('success', 'Server created.');
    }

    public function edit(Server $server)
    {
        $brands = Brand::query()
            ->select('id', 'name')
            ->orderBy('name')
            ->get()
            ->toArray();

        $memories = Memory::query()
            ->select('id', 'size', 'type')
            ->orderBy('type')
            ->orderBy('size')
            ->get()
            ->toArray();

        $memoriesAttached = $server->memories()
            ->select('id')
            ->get()
            ->pluck('id')
            ->toArray();

        return Inertia::render('Servers/Edit', [
            'server' => [
                'id' => $server->id,
                'brand_id' => $server->brand_id,
                'asset_id' => $server->asset_id,
                'name' => $server->name,
                'price' => $server->price,
                'deleted_at' => $server->deleted_at,
            ],
            'brands' => $brands,
            'memories' => $memories,
            'memories_attached' => $memoriesAttached
        ]);
    }

    public function update(StoreServerRequest $request, Server $server)
    {
        $server->update($request->all());

        $server->memories()->sync($request->input('memories'));

        return Redirect::back()->with('success', 'Server updated.');
    }

    public function destroy(Server $server)
    {
        $server->delete();

        return Redirect::route('servers')->with('success', 'Server deleted.');
    }

    public function restore(Server $server)
    {
        $server->restore();

        return Redirect::route('server')->with('success', 'Server restored.');
    }
}
