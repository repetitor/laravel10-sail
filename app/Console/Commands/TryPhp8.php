<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TryPhp8 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:try-php8';

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
        $a = $this->testName(1, b: 2, c: 3);
        echo $a.PHP_EOL;

        echo $this->leftAssoc(555).PHP_EOL;
    }

    private function testName(int $a, int $b, int $c): int
    {
        return $a + $b + $c;
    }

    private function leftAssoc(int $a): int
    {
        return $a === 1 ? 1 : ($a === 2 ? 2 : 3);
    }
}
