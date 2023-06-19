<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Http\Resources\BotUpdateResource;
use App\Http\Resources\HostResource;
use App\Services\Telegram\TelegramBotService;

class TelegramBotController extends Controller
{
    public function __construct(TelegramBotService $service)
    {
        $this->service = $service;
    }

    /**
     * Get me.
     *
     * @OA\Get(
     *  path="/api/telegram-bot/me",
     *  tags={"TelegramApi"},
     *
     *  @OA\Response(response="200", description="OK", @OA\JsonContent()),
     *  @OA\Response(response="default", description="Error", @OA\JsonContent()),
     * )
     */
    public function getMe()
    {
        return $this->service->getMe();
    }

    /**
     * Get updates.
     *
     * @OA\Get(
     *  path="/api/telegram-bot/updates",
     *  tags={"TelegramApi"},
     *
     *  @OA\Response(response="200", description="OK", @OA\JsonContent()),
     *  @OA\Response(response="default", description="Error", @OA\JsonContent()),
     * )
     */
    public function getUpdates()
    {
        return $this->service->getUpdates();
    }

    /**
     * Save updates.
     *
     * @OA\Post(
     *  path="/api/telegram-bot/updates",
     *  tags={"TelegramApi"},
     *
     *  @OA\Response(response="200", description="OK", @OA\JsonContent()),
     *  @OA\Response(response="default", description="Error", @OA\JsonContent()),
     * )
     */
    public function saveUpdates()
    {
        return BotUpdateResource::collection($this->service->treatUpdates());
    }

    /**
     * Get my hosts.
     *
     * @OA\Post(
     *  path="/api/telegram-bot/hosts",
     *  tags={"TelegramApi"},
     *
     *  @OA\Response(response="200", description="OK", @OA\JsonContent()),
     *  @OA\Response(response="default", description="Error", @OA\JsonContent()),
     * )
     */
    public function getMyHosts()
    {
        return $this->service->getMyHosts() ? HostResource::collection($this->service->getMyHosts()) : null;
    }
}
