<?php


namespace Contingens\Intercom;


use Illuminate\Support\ServiceProvider;
use Intercom\IntercomClient;

class IntercomServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IntercomClient::class, function() {
           return new IntercomClient(
               config('services.intercom.api_key'),
               config('services.intercom.api_secret')
           );
        });

        $this->app->bind(Intercom::class, function() {
            $client = $this->app->make(IntercomClient::class);

            return new Intercom($client, config('services.intercom.verification_token'));
        });
    }
}