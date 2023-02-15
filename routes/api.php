<?php

use App\Http\Middleware\SecureAccess;
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

Route::prefix('authentication')->group(function () {

    Route::get('/signin', [\App\Http\Controllers\AuthenticationController::class, 'signIn'])->name('auth.signin');

    Route::middleware('guest')->group(function () {
        Route::post('/signup', [\App\Http\Controllers\AuthenticationController::class, 'signUp'])->name('auth.signup');
        Route::post('/login', [\App\Http\Controllers\AuthenticationController::class, 'logIn'])->name('auth.login');
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [\App\Http\Controllers\AuthenticationController::class, 'logOut'])->name('auth.logout');
    });
});

Route::get('/location', [\App\Http\Controllers\LocationController::class, 'show']);

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);

Route::get('/targets/attack', [\App\Http\Controllers\TargetController::class, 'attackList']);
Route::apiResource('targets', \App\Http\Controllers\TargetController::class)->only('index', 'show');
Route::apiResource('targets', \App\Http\Controllers\TargetController::class)->only('store')->middleware('auth:sanctum');

Route::apiResource('categories', \App\Http\Controllers\CategoryController::class)->only('index', 'show');

/*
 * Set APP_SECRET key in .env file and use it in your cron task to call this route securely
 * e.g. curl --header "X-App-Secret: {your_app_secret_here}" {your_route_here}
 */
Route::get('/target/check-hosts', \App\Http\Controllers\CheckHostController::class)->middleware([SecureAccess::class]);
