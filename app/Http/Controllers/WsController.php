<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WsController extends Controller
{
    public function test()
    {
        return view('ws');
    }

    public function testPost(Request $request)
    {
        Log::info($request);
    }
}
