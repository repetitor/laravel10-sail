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
//    return \App\Models\User::find(1)?->phone;
//    return \App\Models\Phone::find(1)?->user;

//    return \App\Models\Post::find(1)?->comments;
//    return \App\Models\Comment::find(1)?->post;

//    return \App\Models\User::find(1)?->roles;
    return \App\Models\Role::find(1)?->users;
});
