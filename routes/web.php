<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\MemoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServersController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    if(!auth()->check()) {
        return redirect()->route('login');
    }
    return redirect()->route('brands');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard/Index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Brands
Route::get('brands', [BrandsController::class, 'index'])
    ->name('brands')
    ->middleware('auth');

Route::get('brands/create', [BrandsController::class, 'create'])
    ->name('brands.create')
    ->middleware('auth');

Route::post('brands', [BrandsController::class, 'store'])
    ->name('brands.store')
    ->middleware('auth');

Route::get('brands/{brand}/edit', [BrandsController::class, 'edit'])
    ->name('brands.edit')
    ->middleware('auth');

Route::put('brands/{brand}', [BrandsController::class, 'update'])
    ->name('brands.update')
    ->middleware('auth');

Route::delete('brands/{brand}', [BrandsController::class, 'destroy'])
    ->name('brands.destroy')
    ->middleware('auth');

Route::put('brands/{brand}/restore', [BrandsController::class, 'restore'])
    ->name('brands.restore')
    ->middleware('auth');

// Servers
Route::get('servers', [ServersController::class, 'index'])
    ->name('servers')
    ->middleware('auth');

Route::get('servers/create', [ServersController::class, 'create'])
    ->name('servers.create')
    ->middleware('auth');

Route::post('servers', [ServersController::class, 'store'])
    ->name('servers.store')
    ->middleware('auth');

Route::get('servers/{server}/edit', [ServersController::class, 'edit'])
    ->name('servers.edit')
    ->middleware('auth');

Route::put('servers/{server}', [ServersController::class, 'update'])
    ->name('servers.update')
    ->middleware('auth');

Route::delete('servers/{server}', [ServersController::class, 'destroy'])
    ->name('servers.destroy')
    ->middleware('auth');

Route::put('servers/{server}/restore', [ServersController::class, 'restore'])
    ->name('servers.restore')
    ->middleware('auth');

// Memories
Route::get('memories', [MemoriesController::class, 'index'])
    ->name('memories')
    ->middleware('auth');

Route::get('memories/create', [MemoriesController::class, 'create'])
    ->name('memories.create')
    ->middleware('auth');

Route::post('memories', [MemoriesController::class, 'store'])
    ->name('memories.store')
    ->middleware('auth');

Route::get('memories/{memory}/edit', [MemoriesController::class, 'edit'])
    ->name('memories.edit')
    ->middleware('auth');

Route::put('memories/{memory}', [MemoriesController::class, 'update'])
    ->name('memories.update')
    ->middleware('auth');

Route::delete('memories/{memory}', [MemoriesController::class, 'destroy'])
    ->name('memories.destroy')
    ->middleware('auth');

Route::put('memories/{memory}/restore', [MemoriesController::class, 'restore'])
    ->name('memories.restore')
    ->middleware('auth');


require __DIR__.'/auth.php';
