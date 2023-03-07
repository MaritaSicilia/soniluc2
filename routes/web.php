<?php

use App\Http\Controllers\AltavocesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlquileresController;
use App\Http\Livewire\Pagination;
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
Route::get('/index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');

//Route::get('/', [AltavocesController::class, 'index'])->name('index');

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::resource('user', UserController::class)->middleware(['auth', 'verified']);
Route::resource('altavoz', AltavocesController::class)->middleware(['auth', 'verified']);
Route::resource('alquiler', AlquileresController::class)->middleware(['auth', 'verified']);





/**
 * Solo el usuario con rol de oficinista tendrá acceso a las rutas de edit, create y update.
 * Las rutas index y store serán visibles para el resto de usuarios
 */
/*
 Route::middleware(['auth', 'role:oficinista'])->group(function () {
    Route::resource('altavoz', AltavocesController::class)->except(['index', 'show']);
    Route::get('/altavoz/create', [AltavocesController::class, 'create'])->name('altavoz.create');
    Route::get('/altavoz/{altavoz}/edit', [AltavocesController::class, 'edit'])->name('altavoz.edit');
    Route::put('/altavoz/{altavoz}', [AltavocesController::class, 'update'])->name('altavoz.update');
});

/**
 * Las rutas de index, create, edit y update del UserController solo serán accesibles por usuarios con el rol de "admin"
 */
/*
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
});
*/



