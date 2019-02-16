<?php


namespace Contingens\Intercom\Tests;


use Contingens\Intercom\Intercom;
use Contingens\Intercom\IntercomServiceProvider;
use Tests\TestCase;

class LaravelTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_resolve_an_intercom_client_from_the_container()
    {
        config()->set('services.intercom.app_id', 'app_id');
        config()->set('services.intercom.access_token', 'secret');
        config()->set('services.intercom.verification_token', 'token');

        $this->app->register(IntercomServiceProvider::class);

        /** @var Intercom $client */
        $client = $this->app->make(Intercom::class);
        $this->assertEquals('app_id', $client->appId());
        $this->assertEquals('secret', $client->client()->appIdOrToken);
        $this->assertEquals('token', $client->verificationToken());
    }
}