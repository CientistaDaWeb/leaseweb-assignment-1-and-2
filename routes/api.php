<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\MemoryController;
use App\Http\Controllers\Api\ServerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resources([
        'servers' => ServerController::class,
        'brands' => BrandController::class,
        'memories' => MemoryController::class
    ]);
});

