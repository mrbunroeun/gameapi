<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function store(Request $request)
    {
        // Example: Create a game from JSON input
        $game = Game::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'rating' => $request->rating,
        ]);

        return response()->json($game, 201);
    }
}

