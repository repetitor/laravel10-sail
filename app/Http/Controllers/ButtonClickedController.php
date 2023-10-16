<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\ButtonClicked;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ButtonClickedController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
//        ButtonClicked::dispatch(message: 'Hello world!');
        ButtonClicked::dispatch('Hello world!');

        return response()->json(['success' => true]);
    }
}
