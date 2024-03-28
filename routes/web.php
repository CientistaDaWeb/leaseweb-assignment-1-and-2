<?php

Route::get('/', function () {
    echo 'Hello, World! Its a Code chalenge';
});

\Illuminate\Support\Facades\Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
