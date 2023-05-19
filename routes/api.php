<?php

use App\Http\Controllers\Telegram\TelegramBotController;
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

Route::prefix('telegram-bot')->namespace('Telegram')->group(function () {
    Route::get('me', [TelegramBotController::class, 'getMe']);
    Route::get('updates', [TelegramBotController::class, 'getUpdates']);
    Route::post('updates', [TelegramBotController::class, 'saveUpdates']);
});
