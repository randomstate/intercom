<?php


namespace Contingens\Intercom\Tests\fakes;

use Intercom\IntercomCompanies;
use Intercom\IntercomUsers;
use Mockery as m;

class IntercomClient
{
    public $users;
    public $companies;

    public function __construct()
    {
        $this->users = m::spy(IntercomUsers::class);
        $this->companies = m::spy(IntercomCompanies::class);
    }
}