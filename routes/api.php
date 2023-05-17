<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test-telescope', function () {
    return response(['message' => 'hello from telescope!']);
});

Route::get('telega', function () {
    return Http::get('https://api.telegram.org/bot6010132260:AAHCUMUAvpz_bsaQKavFa1vIzVa5izMw_CU/getMe');
});
