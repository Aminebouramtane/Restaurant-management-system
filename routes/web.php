<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;
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
    return view('visiteur.menu');
});

Route::get("/menu", [CategorieController::class, "index"])->name("menu");
Route::get("/plats/{categorie}", [CategorieController::class, "plats"])->name("plats_categorie");



Route::get('/dashboard', function () {
    return view('serveur.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('Commandes', CommandeController::class);
});

require __DIR__.'/auth.php';

