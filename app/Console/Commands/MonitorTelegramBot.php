<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class MonitorTelegramBot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:monitor-telegram-bot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo Http::get('https://api.telegram.org/bot6010132260:AAHCUMUAvpz_bsaQKavFa1vIzVa5izMw_CU/getMe').PHP_EOL;
        Http::get('https://api.telegram.org/bot6010132260:AAHCUMUAvpz_bsaQKavFa1vIzVa5izMw_CU/sendMessage?chat_id=394257307&text=test-text-lalalala');
    }
}
