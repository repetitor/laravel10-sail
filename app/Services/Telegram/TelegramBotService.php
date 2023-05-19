<?php

namespace App\Services\Telegram;

use App\Models\BotUpdate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramBotService
{
    private string $uri;

    public function __construct()
    {
        $this->uri = 'https://api.telegram.org/bot'.config('telegram.bot_token');
    }

    public function getMe(): string
    {
        return Http::get($this->uri.'/getMe');
    }

    public function getUpdates(): string
    {
        return Http::get($this->uri.'/getUpdates');
    }

    public function saveUpdates(): Collection
    {
        $updates = Http::get($this->uri.'/getUpdates');
        foreach ($updates['result'] as $update) {
            try {
                BotUpdate::create([
                    'update_id' => $update['update_id'],
                    'message_id' => $update['message']['message_id'],
                    'date' => $update['message']['date'],
                    'text' => $update['message']['text'],
                ]);
            } catch (\Exception $e) {
                Log::debug($e->getMessage());
            }
        }

        return BotUpdate::all();
    }
}
