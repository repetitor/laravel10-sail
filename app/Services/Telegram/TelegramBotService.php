<?php

namespace App\Services\Telegram;

use App\Enums\CommandEnum;
use App\Models\BotUpdate;
use App\Models\Host;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
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

    public function getTestResponse(): array
    {
        $str = '{
    "ok": true,
    "result": [
        {
            "update_id": 424876518,
            "message": {
                "message_id": 254,
                "from": {
                    "id": 394257307,
                    "is_bot": false,
                    "first_name": "Viktar",
                    "last_name": "Repetitor202",
                    "username": "repetitor202",
                    "language_code": "en"
                },
                "chat": {
                    "id": 394257307,
                    "first_name": "Viktar",
                    "last_name": "Repetitor202",
                    "username": "repetitor202",
                    "type": "private"
                },
                "date": 1687344319,
                "text": "123"
            }
        },
        {
            "update_id": 424876519,
            "message": {
                "message_id": 255,
                "from": {
                    "id": 394257307,
                    "is_bot": false,
                    "first_name": "Viktar",
                    "last_name": "Repetitor202",
                    "username": "repetitor202",
                    "language_code": "en"
                },
                "chat": {
                    "id": 394257307,
                    "first_name": "Viktar",
                    "last_name": "Repetitor202",
                    "username": "repetitor202",
                    "type": "private"
                },
                "date": 1687344323,
                "text": "/store&lt=2333&lg=3&d=descr",
                "entities": [
                    {
                        "offset": 0,
                        "length": 5,
                        "type": "bot_command"
                    }
                ]
            }
        },
        {
            "update_id": 424876520,
            "message": {
                "message_id": 256,
                "from": {
                    "id": 394257307,
                    "is_bot": false,
                    "first_name": "Viktar",
                    "last_name": "Repetitor202",
                    "username": "repetitor202",
                    "language_code": "en"
                },
                "chat": {
                    "id": 394257307,
                    "first_name": "Viktar",
                    "last_name": "Repetitor202",
                    "username": "repetitor202",
                    "type": "private"
                },
                "date": 1687344329,
                "text": "/update&id=19&lt=22&lg=23&d=descr22323 hghg2332 hghgh",
                "entities": [
                    {
                        "offset": 0,
                        "length": 5,
                        "type": "bot_command"
                    }
                ]
            }
        }
    ]
}';

        return json_decode($str, true);
    }

    public function treatUpdates(): Collection
    {
        $updates = Http::get($this->uri.'/getUpdates');
//        $updates = $this->getTestResponse();

        foreach ($updates['result'] as $update) {
            try {
                BotUpdate::create([
                    'update_id' => $update['update_id'],
                    'message_id' => $update['message']['message_id'],
                    'date' => $update['message']['date'],
                    'text' => $update['message']['text'],
                    //                    'command' => $update['message']['command'],
                ]);
            } catch (\Exception $e) {
                Log::debug($e->getMessage());
            }

            $message = $update['message'];
            if (
                isset($message['entities'])
                && isset($message['entities'][0])
                && isset($message['entities'][0]['type'])
                && $message['entities'][0]['type'] === 'bot_command'
            ) {
                $text = $message['text'];
                parse_str($text, $textParsed);

                if (Arr::has($textParsed, '/store')) {
                    $this->trySaveHost(
                        $update['message']['from']['id'],
                        $update['message']['text'] ?? null,
                    );
                }

                if (Arr::has($textParsed, '/update')) {
                    $this->tryUpdateHost(
                        $update['message']['from']['id'],
                        $update['message']['text'] ?? null,
                    );
                }
            }
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
            $hostNew = $this->createUpdateHost($host, $res);
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

    public function tryUpdateHost(
        int $fromId,
        ?string $text,
    ): void {
        parse_str($text, $res);

        if (is_array($res)) {
            if (Arr::has($res, CommandEnum::Update->value) && Arr::has($res, 'id')) {
                $host = Host::where('id', $res['id'])->first();
                $hostNew = $this->createUpdateHost($host, $res);
            }
        }
    }

    private function createUpdateHost(Host $host, array $params): Host
    {
        foreach ($params as $k => $v) {
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

        return $host;
    }
}
