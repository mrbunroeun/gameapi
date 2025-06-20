<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Models\Game;

Route::post('/games', [GameController::class, 'store']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/games', function (Request $request) {
    return \App\Models\Game::create($request->only('title', 'genre'));
});


Route::get('/games', function () {
    return Game::with(['publisher', 'developers'])->get();
});
