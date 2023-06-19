<?php

namespace Database\Seeders;

use App\Models\BotUpdate;
use Illuminate\Database\Seeder;

class BotUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BotUpdate::factory(3)->create();
    }
}
