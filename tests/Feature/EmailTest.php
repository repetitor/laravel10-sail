<?php

namespace Tests\Feature;

use App\Mail\OrderShipped;
use Tests\TestCase;

class EmailTest extends TestCase
{
    public function test_mailable_content(): void
    {
//        $user = User::factory()->create();
//
//        $mailable = new InvoicePaid($user);
        $mailable = new OrderShipped();

//        $mailable->assertFrom('viktar.bona@mail.ru');
//        $mailable->assertTo('repetitor202@gmail.com');
//        $mailable->assertHasSubject('Invoice Paid');

//        $mailable->assertSeeInText('Test: hello');
    }
}
