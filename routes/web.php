<?php

use App\Http\Controllers\PartidoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

require __DIR__.'/auth.php';

Route::resource('tipocampeonatos', App\Http\Controllers\TipocampeonatoController::class);
Route::resource('campeonatos', App\Http\Controllers\CampeonatoController::class);
Route::resource('categorias', App\Http\Controllers\CategoriaController::class);
Route::resource('generos', App\Http\Controllers\GeneroController::class);
Route::resource('participantes', App\Http\Controllers\ParticipanteController::class);
Route::resource('inscritos', App\Http\Controllers\InscritoController::class);
Route::resource('partidos', App\Http\Controllers\PartidoController::class);
Route::resource('resultados', App\Http\Controllers\ResultadoController::class);
Route::get('/get-players', [PartidoController::class, 'getPlayers'])->name('get-players');



