<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TryConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:try-console';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        echo 'hi from console!'.PHP_EOL;
    }
}
