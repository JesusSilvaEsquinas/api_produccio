<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas del recurso games
Route::resource('games', GameController::class);

require __DIR__.'/auth.php';