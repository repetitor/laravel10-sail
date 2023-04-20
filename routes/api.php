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
    return 'test202';
});

Route::prefix('tests')->group(function () {
    Route::get('', function () {return 'ok';});
    // ...CRUD1

    Route::prefix('{id}')->group(function () {
        Route::get('', function (int $id) {return $id;});
        // ...CRUD2

        Route::prefix('children')->group(function () {
            Route::get('', function ($id) {return $id;});
            // ...CRUD3

            Route::get('{idChild}', function (int $idChild, int $id) {return "$id - $idChild";});
            // ...CRUD4

//            Route::prefix('{idChild}')->group(function () {
////                Route::get('', function (int $idChild, int $id) {return ENTITY . '/' . $id . '/' . CHILDREN . '/' . $idChild;});
//                Route::get('', function () {return url()->current();});
//                // ...CRUD4
//            });
        });
    });
});
//Route::prefix(CHILDREN. '/{id}/' . CHILDREN . '/{idChild}')->group(function () {
//    Route::get('', function (int $idChild, int $id) {
////        return ENTITY . '/' . $id . '/' . CHILDREN . '/' . $idChild;
////        return url()->current();
//    });
//    // ...CRUD4
//});
