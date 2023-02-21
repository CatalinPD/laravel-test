<?php

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

Route::get('/', [IndexController::class, 'index']);

// when a user comes with GET request method
// to the URL /awards
// handle the request with the AwardController
// and its index() method
Route::get('/awards', [AwardController::class, 'index']);

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/people', [PersonController::class, 'index']);
Route::get('/movies/shawshank', [MovieController::class, 'shawshank']);