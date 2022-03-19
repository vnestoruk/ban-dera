<?php

use App\Http\Controllers\CheckHostController;
use App\Http\Controllers\TargetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Put CheckHostController route here... This route will be hidden for security reasons */

Route::get('/targets', [TargetController::class, 'index']);
Route::get('/target/replace', [TargetController::class, 'replace']);
