<?php

use App\Http\Controllers\ButtonClickedController;
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

Route::get('event', function () {
    event(new \App\Events\MessageNotification('broadcast-message'));

    return null;
});

Route::get('listen', function () {
    return 'lalala';
});

Route::get('ws', [\App\Http\Controllers\WsController::class, 'test']);
Route::post('ws', [\App\Http\Controllers\WsController::class, 'testPost']);

Route::post('button/clicked', ButtonClickedController::class);
