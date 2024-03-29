<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServerRequest;
use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index()
    {
        $page = request()->input('page', 20);
        return Server::query()
            ->with('brand', 'memories')
            ->paginate($page);
    }

    public function show(Server $server)
    {
        return response()->json($server);
    }

    public function store(StoreServerRequest $request)
    {
        $server = Server::create($request->all());

        $server->memories()->sync($request->input('memories'));

        return response()->json($server, 201);
    }

    public function update(StoreServerRequest $request, Server $server)
    {
        $server->update($request->all());

        $server->memories()->sync($request->input('memories'));

        return response()->json($server);
    }

    public function destroy(Server $server)
    {
        $server->delete();

        return response()->json(null, 204);
    }
}
