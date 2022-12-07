<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::view('/', 'welcome');

/* Route when using resources controller. Includes authentication middleware to prevent access if not logged in */
Route::resource('players', PlayerController::class)->middleware('auth');

/* Standard routes if not using resource controller. Authentication middleware added */

//Route::get('players', [PlayerController::class, 'index'])->middleware('auth');
//Route::get('players/{id}/edit', [PlayerController::class, 'edit'])->middleware('auth');
//Route::get('players/{id}', [PlayerController::class, 'show'])->middleware('auth');
//Route::get('players/create', [PlayerController::class, 'create'])->middleware('auth');
//Route::post('players/store', [PlayerController::class, 'store'])->middleware('auth');
//Route::put('players/{id}', [PlayerController::class, 'update'])->middleware('auth');
//Route::delete('players/{id}', [PlayerController::class, 'destroy'])->middleware('auth'));
