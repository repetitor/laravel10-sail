<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class TelegramBotTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        Http::shouldReceive('get')
            ->once()
            ->with('https://api.telegram.org/bot'.config('telegram.bot_token').'/getUpdates')
            ->andReturn(['result' => []]);

        $response = $this->postJson('/api/telegram-bot/updates');
        Log::debug(serialize($response));

        $response->assertStatus(200);
    }
}
