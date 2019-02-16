<?php


namespace Contingens\Intercom;


use Intercom\IntercomClient;

class Intercom
{
    protected $map = [];

    /**
     * @var IntercomClient
     */
    protected $intercomClient;

    /**
     * @var string | null
     */
    protected $verificationToken;

    /**
     * @var string
     */
    protected $appId;

    public function __construct($intercomClient, $appId, $verificationToken = null)
    {
        $this->intercomClient = $intercomClient;
        $this->appId = $appId;
        $this->verificationToken = $verificationToken;
    }

    public function client()
    {
        return $this->intercomClient;
    }

    public function register($trackableClass, $mapperInstance)
    {
        $this->map[$trackableClass] = $mapperInstance;

        return $this;
    }

    public function create($trackable)
    {
        $this->getClient($this->resolveMapper($trackable))
            ->create($this->prepareData($trackable));

        return $this;
    }

    public function update($trackable)
    {
        $this->getClient($this->resolveMapper($trackable))
            ->update($this->prepareData($trackable));

        return $this;
    }

    /**
     * @param $trackable
     * @return UserDataMapper | CompanyDataMapper
     * @throws \Exception
     */
    protected function resolveMapper($trackable)
    {
        return $this->resolveMapperForClass(new \ReflectionClass($trackable));
    }

    protected function resolveMapperForClass(\ReflectionClass $class)
    {
        $mapper = $this->map[$class->getName()] ?? null;

        if(!$mapper && $class->getParentClass()) {
             return $this->resolveMapperForClass($class->getParentClass());
        }

        if(!$mapper) {
            throw new \Exception("No intercom data mapper registered for class: " . $class);
        }

        return $mapper;
    }

    protected function getClient($mapper)
    {
        return ($mapper instanceof CompanyDataMapper) ? $this->intercomClient->companies : $this->intercomClient->users;
    }

    protected function prepareData($trackable)
    {
        $mapper = $this->resolveMapper($trackable);

        if($mapper instanceof CompanyDataMapper) {
            return $this->prepareCompanyData($trackable);
        }

        $companies = $mapper->companies($trackable);
        $companyData = [];
        foreach($companies as $company) {
            $companyData[] = $this->prepareCompanyData($company);
        }

        return $this->removeEmptyValues([
            'user_id' => $mapper->userId($trackable),
            'signed_up_at' => $mapper->signedUpAt($trackable) ? $mapper->signedUpAt($trackable)->getTimestamp() : null,
            'email' => $mapper->email($trackable),
            'phone' => $mapper->phone($trackable),
            'last_seen_ip' => $mapper->lastSeenIp($trackable),
            'name' => $mapper->name($trackable),
            'user_agent' => $mapper->userAgent($trackable),
            'companies' => $companyData,
            'custom_attributes' => $mapper->customAttributes($trackable),
        ]);
    }

    protected function prepareCompanyData($company)
    {
        $mapper = $this->resolveMapper($company);
        $createdAt = $mapper->createdAt($company);
        $spend = $mapper->monthlySpend($company);

        return $this->removeEmptyValues([
            'company_id' => $mapper->companyId($company),
            'remote_created_at' => $createdAt ? $createdAt->getTimestamp() : null,
            'name' => $mapper->name($company),
            'monthly_spend' => $spend ? round($spend) : null,
            'plan' => $mapper->plan($company),
            'size' => $mapper->size($company),
            'website' => $mapper->website($company),
            'industry' => $mapper->industry($company),
            'custom_attributes' => $mapper->customAttributes($company),
        ]);
    }

    protected function removeEmptyValues($data)
    {
        $newData = [];
        foreach($data as $key => $value) {
            if($value !== null || is_array($value) && count($value) > 0) {
                $newData[$key] = $value;
            }
        }

        return $newData;
    }

    public function generateVerificationHash($user)
    {
        $mapper = $this->resolveMapper($user);
        $id = $mapper->userId($user);

        return hash_hmac(
            'sha256',
            $id,
            $this->verificationToken
        );
    }

    public function verificationToken()
    {
        return $this->verificationToken;
    }

    public function appId()
    {
        return $this->appId;
    }
}