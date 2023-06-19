<?php

namespace App\Http\Resources;

use App\Enums\CommandEnum;
use App\Models\BotUpdate;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BotUpdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* @var BotUpdate $this */
        return [
            'id' => $this->id,
            'update_id' => $this->update_id,
            'message_id' => $this->message_id,
            'date' => $this->date,
            'text' => $this->text,
            //            'command' => $this->command,
            'command' => CommandEnum::tryFrom($this->command)?->value,
        ];
    }
}
