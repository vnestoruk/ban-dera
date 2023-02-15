<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/media/{media}', function ($media) {
    switch ($media) {
        case 'telegram':
            $path = 'https://t.me/ban_dera_com';
            break;
        case 'youtube':
            $path = 'https://www.youtube.com/channel/UCOLh8pXAIT-6oGMaf3GadTA';
            break;
        default:
            $path = config('app.url');
    }

    response()->redirectTo($path);
});

Route::get('/{any}', [\App\Http\Controllers\Controller::class, 'index'])->where('any', '^(?!api).*$');

//Route::get('/media/{media}', function ($media) {
//    switch ($media) {
//        case 'youtube':
//            return response()->redirectTo('https://www.youtube.com/channel/UCOLh8pXAIT-6oGMaf3GadTA');
//    }
//
//    return response()->redirectTo('');
//});
