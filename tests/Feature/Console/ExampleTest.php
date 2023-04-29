<?php

namespace Tests\Feature\Console;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Test a console command.
     */
    public function test_console_command(): void
    {
        $this->artisan('app:try-console')->assertExitCode(0);
    }
}
