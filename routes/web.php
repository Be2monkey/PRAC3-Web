<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamsController;
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

Route::get('/teams', function () {
    return view('teams');
})->middleware(['auth', 'verified'])->name('teams');

Route::get('/inschrijven', function () {
    return view('inschrijven');
})->middleware(['auth', 'verified'])->name('inschrijven');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/teams', [TeamsController::class, 'index'])->name('teams.index');
Route::get('/teams/create', [TeamsController::class, 'create'])->name('teams.create');
Route::post('/teams/create', [TeamsController::class, 'store'])->name('teams.store');

Route::get('/inschrijven', [TeamsController::class, 'inschrijven'])->name('teams.inschrijven');

Route::get('/teams/edit/{team}', [TeamsController::class, 'edit'])->name('teams.edit');
Route::post('/teams/edit/{team}', [TeamsController::class, 'update'])->name('teams.update');


require __DIR__.'/auth.php';
