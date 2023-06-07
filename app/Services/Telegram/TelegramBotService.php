<?php

namespace App\Services\Telegram;

use App\Models\BotUpdate;
use App\Models\Host;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramBotService
{
    private const LATITUDE_KEY = 'lt';

    private const LONGITUDE_KEY = 'lg';

    private const DESCRIPTION_KEY = 'd';

    private string $uri;

    public function __construct()
    {
        $this->uri = 'https://api.telegram.org/bot'.config('telegram.bot_token');
    }

    public function getMe(): array
    {
        return json_decode(Http::get($this->uri.'/getMe'), true);
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

            $this->trySaveHost(
                $update['message']['from']['id'],
                $update['message']['text'] ?? null,
            );
        }

        return BotUpdate::all();
    }

    private function trySaveHost(
        int $fromId,
        ?string $text,
    ): void {
        parse_str($text, $res);

        if (is_array($res)) {
            $host = new Host();
            $host->from_id = $fromId;

            foreach ($res as $k => $v) {
                if ($k === self::LATITUDE_KEY) {
                    $host->latitude = $v;
                }
                if ($k === self::LONGITUDE_KEY) {
                    $host->longitude = $v;
                }
                if ($k === self::DESCRIPTION_KEY) {
                    $host->description = $v;
                }
            }

            $host->save();
        }
    }

    public function getMyHosts(): ?Collection
    {
        $updates = Http::get($this->uri.'/getUpdates');
        foreach ($updates['result'] as $update) {
            if (isset($update['message']['entities'])
                && isset($update['message']['entities'][0]['type'])
                && $update['message']['entities'][0]['type'] === 'bot_command') {
                if ($update['message']['text'] === '/my_hosts') {
                    return Host::where('from_id', $update['message']['from']['id'])->get();
                }
            }
        }

        return null;
    }
}
