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
        config()->set('services.intercom.api_key', 'api_key');
        config()->set('services.intercom.api_secret', 'secret');
        config()->set('services.intercom.verification_token', 'token');

        $this->app->register(IntercomServiceProvider::class);

        /** @var Intercom $client */
        $client = $this->app->make(Intercom::class);
        $this->assertEquals('api_key', $client->client()->appIdOrToken);
        $this->assertEquals('secret', $client->client()->passwordPart);
        $this->assertEquals('token', $client->verificationToken());
    }
}