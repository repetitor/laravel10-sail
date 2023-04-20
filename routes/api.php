<?php

use Illuminate\Http\Request;
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

Route::get('test', function () {
    return url()->current();
});

Route::prefix('parents')->group(function () {
    Route::get('', function () {return 'parents';});
    // ...CRUD1

    Route::prefix('{id}')->group(function () {
        Route::get('', function (int $id) {return "parent $id";});
        // ...CRUD2

        Route::prefix('babies')->group(function () {
            Route::get('', function ($id) {return "babies of parent $id";});
            // ...CRUD3

            Route::get('{idBaby}', function (int $id, int $idBaby) {return "parent $id - baby $idBaby";});
            // ...CRUD4
        });
    });
});
