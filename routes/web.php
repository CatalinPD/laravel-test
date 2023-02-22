<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PersonController;
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

Route::get('/', [IndexController::class, 'index'])->name('homepage');

Route::get('/about-us', [AboutController::class, 'aboutUs']);

Route::redirect('/terms', '/terms-and-conditions', 302);

//                                   ↓↓ identifier of the view
//                   /resources/views/terms.blade.php
Route::view('/terms-and-conditions', 'terms');

// when a user comes with GET request method
// to the URL /awards
// handle the request with the AwardController
// and its index() method
Route::get('/awards', [AwardController::class, 'index'])->name('awards.index');

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/people', [PersonController::class, 'index'])->name('people.index');
Route::get('/movies/shawshank', [MovieController::class, 'shawshank']);

Route::get('/movies/{movie_id}/{style?}', [MovieController::class, 'show'])
    ->whereNumber('movie_id')
    ->whereIn('style', ['basic', 'detailed'])
    ->name('movies.show');

Route::get('/movies/{genre_slug}', [MovieController::class, 'moviesOfGenre'])->name('movies.genre');

// /movies/111161
// /movies/action
// /movies/romantic

Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');

Route::post('/people', [PersonController::class, 'insert'])->name('people.insert');