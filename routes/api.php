<?php

use App\Http\Controllers\CheckHostController;
use App\Http\Controllers\TargetController;
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


Route::get('/targets', [TargetController::class, 'index']);

/*
 * Set APP_SECRET key in .env file and use it in your cron task to call this route securely
 * e.g. curl --header "X-App-Secret: {your_app_secret_here}" {your_route_here}
 */
Route::get('/target/check-hosts', CheckHostController::class)->middleware([SecureAccess::class]);
