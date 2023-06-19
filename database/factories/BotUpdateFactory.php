<?php

namespace Database\Factories;

use App\Enums\CommandEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BotUpdate>
 */
class BotUpdateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'update_id' => fake()->unique()->randomNumber(),
            'message_id' => fake()->unique()->randomNumber(),
            'date' => fake()->unixTime,
            'text' => fake()->sentence(3),
            'command' => fake()->randomElement(CommandEnum::cases()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
