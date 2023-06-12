<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('la-login', function () {
    $user = \App\Models\User::find(1);

    $token = Str::random(60);

    $user->api_token = hash('sha256', $token);
    $user->save();

    return ['token' => $token];
});

Route::middleware('auth:api')->post('la-test', function () {
    return 'ok';
});
