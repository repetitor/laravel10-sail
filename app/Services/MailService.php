<?php

namespace App\Services;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;

class MailService
{
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('repetitor202@gmail.com', 'Jeffrey Way'),
            subject: 'Order Shipped',
        );
    }
}
