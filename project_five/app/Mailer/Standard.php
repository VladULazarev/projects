<?php
namespace App\Mailer;

/**
 * Send email
 */
class Standard implements Mailer
{
    public function send(string $email, string $msg): void
    {
        mail($email, "Suscription", $msg);
    }
}
