<?php

namespace App\Http\Controllers;

use App\Http\Resources\BotUpdateResource;
use App\Models\BotUpdate;

class BotUpdateController extends Controller
{
    public function index()
    {
        return BotUpdateResource::collection(BotUpdate::all());
    }
}
