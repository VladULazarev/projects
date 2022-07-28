<?php
namespace App\Fakes;

use App\Mailer\Mailer;

/**
 * Fake class for testing
 */
class FakeMailer implements Mailer
{
    public function send(string $email, string $msg): void
    {

    }
}
