<?php


namespace Contingens\Intercom\Fakes;

use Intercom\IntercomCompanies;
use Intercom\IntercomEvents;
use Intercom\IntercomUsers;
use Mockery as m;

class IntercomClient
{
    public $users;
    public $companies;
    public $events;

    public function __construct()
    {
        $this->users = m::spy(IntercomUsers::class);
        $this->companies = m::spy(IntercomCompanies::class);
        $this->events = m::spy(IntercomEvents::class);
    }
}