<?php

use PHPUnit\Framework\TestCase;
use App\Fakes\FakeMailer;
use App\Http\Controllers\Resource;
use App\Mailer\Mailer;
use App\Mailer\Standard;
use App\Http\Controllers\Subscription;
use App\Http\Controllers\Validator;

class SubscriptionTest extends TestCase
{
    /**
     * @var Subscription
     */
    protected $subscription;

    public function setUp(): void
    {
        // Create 'Fake' class (we do not check if email is sent or not)
        $mailer = new FakeMailer();

        // Create 'Stub' (we do not have to depend on a remote resource)
        $httpResourceStub = $this->createStub(Resource::class);
        $httpResourceStub->method('getData')->willReturn('Something');

        $validator = new Validator;

        $this->subscription = new Subscription($mailer, $httpResourceStub, $validator);
    }

    /**
     * Test a valid email
     */
    public function testValidEmail()
    {
        $email = 'test@gmail.com';
        $resultMesssage = $this->subscription->confirmSubscription($email);
        $this->assertEquals('Subscription confirmed', $resultMesssage);
    }

    /**
     * Test an invalid email
     */
    public function testInvalidEmail()
    {
        $email = 'tes t@gmail.com';
        $resultMesssage = $this->subscription->confirmSubscription($email);
        $this->assertEquals('Your email has invalid format', $resultMesssage);
    }

    /**
     * Test if the method send() is invoke once
     */
    public function testIfMethodInvokeOnce()
    {
        // Create 'Mock' (We do not check if email is sent, we just check if the method is invoked)
        $mailer = $this->createMock(Standard::class);
        $mailer->expects($this->once())->method('send');

        $httpResourceStub = $this->createStub(Resource::class);
        $httpResourceStub->method('getData')->willReturn('Something');

        $validator = new Validator;

        $email = 'test@gmail.com';

        // Create new object (we can not use '$this->subscription' from 'setUp()')
        $this->subscription = new Subscription($mailer, $httpResourceStub, $validator);
        $this->subscription->confirmSubscription($email);
    }
}
