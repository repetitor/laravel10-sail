<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Http\Resources\BotUpdateResource;
use App\Services\Telegram\TelegramBotService;

class TelegramBotController extends Controller
{
    public function __construct(TelegramBotService $service)
    {
        $this->service = $service;
    }

    public function getMe()
    {
        return $this->service->getMe();
    }

    public function getUpdates()
    {
        return $this->service->getUpdates();
    }

    public function saveUpdates()
    {
        return BotUpdateResource::collection($this->service->saveUpdates());
    }
}
