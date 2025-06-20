<?php
// // routes/web.php
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use App\Models\Game;
// use App\Http\Controllers\GameController;

// Route::post('/games', [GameController::class, 'store']);

// Route::get('/games', function () {
//     return \App\Models\Game::all(); // just raw games
// });


// Route::get('/games', function () {
//     return Game::with(['publishers', 'developers'])->get();
// });



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Game;     // Import the Game model
use App\Models\Developer; // Import the Developer model
use App\Models\Publisher; // Import the Publisher model

// --- Your Existing Default Laravel Web Routes ---
use App\Http\Controllers\ProfileController; // Make sure this import is present if you use ProfileController

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; // This line typically includes your authentication routes (login, register, etc.)

// --- Your Gaming API-like GET Endpoints (in web.php, returning JSON) ---

// GET /games
// Returns a list of all games with their associated publisher and developers.
Route::get('/games', function () {
    $games = Game::all();

    return response()->json([
        'status' => 'success',
        'message' => 'Games retrieved successfully',
        'data' => $games
    ], 200); // HTTP 200 OK
});

// GET /developers
// Returns a list of all developers.
Route::get('/developers', function () {
    $developers = Developer::all();

    return response()->json([
        'status' => 'success',
        'message' => 'Developers retrieved successfully',
        'data' => $developers
    ], 200); // HTTP 200 OK
});

// GET /publishers
// Returns a list of all publishers.
Route::get('/publishers', function () {
    $publishers = Publisher::all();

    return response()->json([
        'status' => 'success',
        'message' => 'Publishers retrieved successfully',
        'data' => $publishers
    ], 200); // HTTP 200 OK
});