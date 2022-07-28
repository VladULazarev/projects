<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Resource;
use App\Http\Controllers\Validator;
use App\Mailer\Mailer;

/**
 * Check user's email and send message if it is OK or NOT
 */
class Subscription
{
    /**
     * @var Mailer
     */
    private $mailer;
    /**
     * @var Resource
     */
    private $httpResource;
    /**
     * @var Validator
     */
    private $validator;

    /**
     * @param Mailer $mailer
     * @param Resource $httpResource
     * @param Validator $validator
     */
    public function __construct(Mailer $mailer, Resource $httpResource, Validator $validator)
    {
        $this->mailer = $mailer;
        $this->httpResource = $httpResource;
        $this->validator = $validator;
    }

    /**
     * Test if email is valid
     *
     * @param str $email user's email
     * @return str $message
     */
    public function confirmSubscription(string $email): string
    {
        /**
         * Some data from remote resource(it's just for demonstration of how to use 'Stub')
         */
        $data = $this->httpResource->getData();

        if (! $this->validator->checkEmail($email)) {
            $message = "Your email has invalid format";
        } else {
            $message = "Subscription confirmed";
        }

        $this->mailer->send($email, $message);

        return $message;
    }
}
