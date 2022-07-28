<?php

namespace App\Http\Controllers;

class Validator
{

    /** @var pattern for email */
    private $emailPattern = '/^[\w.\-]{2,30}@[\w\-]{2,30}\.[A-Za-z]{2,8}$/';

    /**
     * Check an email
     * @param string $email
     * @return int '1' if no 'bad' characters was found, otherwise '0'
     */
    public function checkEmail(string $email): int
    {
        return preg_match($this->emailPattern, trim($email));
    }
}
