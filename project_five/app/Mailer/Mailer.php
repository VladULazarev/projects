<?php
namespace App\Mailer;

interface Mailer
{
    public function send(string $email, string $msg);
}
