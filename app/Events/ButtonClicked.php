<?php

declare(strict_types=1);

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class ButtonClicked implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        private readonly string $message
    ) {
        //
    }

    public function broadcastAs(): string
    {
        return 'button.clicked';
    }

    public function broadcastWith(): array
    {
        return [
            'message' => $this->message,
        ];
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('public-channel'),
        ];
    }
}
