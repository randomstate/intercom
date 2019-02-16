<?php


namespace Contingens\Intercom\Tests;


use Contingens\Intercom\Intercom;
use Contingens\Intercom\Fakes\IntercomClient;
use Contingens\Intercom\Tests\fakes\User;
use Contingens\Intercom\Tests\fakes\UserDataMapper;
use Tests\TestCase;

class UserVerificationTest extends TestCase
{
    /**
     * @test
     */
    public function generates_sha_for_user_with_secret_key()
    {
        $user = new User('id_12345678');

        $intercom = new Intercom(new IntercomClient(), 'test', 'JbxHK8gb0wnvtMUZ1HIZDxFH6Q3z0kbQBUEJcuDJ');
        $intercom->register(User::class, new UserDataMapper());

        $hash = $intercom->generateVerificationHash($user);

        $this->assertEquals("a54f16c9e670c966fdd96a2f587bfe32b67af18c3da8c28fe19a54cf19a4aa7a", $hash);
    }
}