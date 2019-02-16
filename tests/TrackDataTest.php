<?php


namespace Contingens\Intercom\Tests;


use Contingens\Intercom\Intercom;
use Contingens\Intercom\Tests\fakes\Company;
use Contingens\Intercom\Tests\fakes\CompanyDataMapper;
use Contingens\Intercom\Fakes\IntercomClient;
use Contingens\Intercom\Tests\fakes\User;
use Contingens\Intercom\Tests\fakes\UserDataMapper;
use Tests\TestCase;

class TrackDataTest extends TestCase
{
    /**
     * @test
     */
    public function can_track_data_for_objects_that_have_a_mapping_class()
    {
        $client = new IntercomClient();
        $intercom = new Intercom($client);

        $intercom->register(User::class, new UserDataMapper());
        $intercom->register(Company::class, new CompanyDataMapper());

        $company = (new Company('c_1234'))
            ->setRemoteCreatedAt($incorporation = new \DateTime())
            ->setName('Acme Ltd')
            ->setMonthlySpend(149.89)
            ->setPlan('standard')
            ->setSize(500)
            ->setWebsite('http://example.com')
            ->setIndustry('Manufacturing')
            ->setCustomAttributes([
                'test_company_key' => 'custom val',
            ])
        ;

        $user = (new User('usr_1234'))
            ->setSignedUpAt($signup = new \DateTime())
            ->setEmail('john@example.com')
            ->setPhone('0123456789')
            ->setLastIp('127.0.0.1')
            ->setName('John Doe')
            ->setUserAgent('Firefox')
            ->setCompanies([$company])
            ->setLastRequestAt(new \DateTime())
            ->setUnsubscribed(true)
            ->setCustomAttributes([
                'test_key' => 'custom',
            ])
        ;

        $companyData = [
            'company_id' => 'c_1234',
            'remote_created_at' => $incorporation->getTimestamp(),
            'name' => 'Acme Ltd',
            'monthly_spend' => 150,
            'plan' => 'standard',
            'size' => 500,
            'website' => 'http://example.com',
            'industry' => 'Manufacturing',
            'custom_attributes' => [
                'test_company_key' => 'custom val',
            ]
        ];

        $userData = [
            'user_id' => 'usr_1234',
            'signed_up_at' => $signup->getTimestamp(),
            'email' => 'john@example.com',
            'phone' => '0123456789',
            'last_seen_ip' => '127.0.0.1',
            'name' => 'John Doe',
            'user_agent' => 'Firefox',
            'companies' => [
                $companyData,
            ],
            'custom_attributes' => [
                'test_key' => 'custom',
            ]
        ];

        $intercom->create($user);
        $intercom->create($company);

        $intercom->update($user);
        $intercom->update($company);

        $client->users->shouldHaveReceived('create')->with($userData);
        $client->companies->shouldHaveReceived('create')->with($companyData);

        $client->users->shouldHaveReceived('update')->with($userData);
        $client->companies->shouldHaveReceived('update')->with($companyData);
    }

    /**
     * @test
     */
    public function it_resolves_mapper_for_subclasses()
    {
        $client = new IntercomClient();
        $intercom = new Intercom($client);

        $intercom->register(User::class, new UserDataMapper());

        $subUser = new class('id_1234') extends User{};

        $intercom->create($subUser);
        $client->users->shouldHaveReceived('create')->once();
    }
}