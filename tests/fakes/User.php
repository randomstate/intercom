<?php


namespace Contingens\Intercom\Tests\fakes;


class User
{
    protected $userId;
    protected $signedUpAt;
    protected $email;
    protected $phone;
    protected $lastIp;
    protected $name;
    protected $userAgent;
    protected $companies;
    protected $lastRequestAt;
    protected $unsubscribed;
    protected $customAttributes = [];

    public function __construct($id)
    {
        $this->userId = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getSignedUpAt()
    {
        return $this->signedUpAt;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getLastIp()
    {
        return $this->lastIp;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @return mixed
     */
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * @return mixed
     */
    public function getLastRequestAt()
    {
        return $this->lastRequestAt;
    }

    /**
     * @return mixed
     */
    public function getUnsubscribed()
    {
        return $this->unsubscribed;
    }

    /**
     * @return array
     */
    public function getCustomAttributes()
    {
        return $this->customAttributes;
    }

    /**
     * @param mixed $signedUpAt
     * @return User
     */
    public function setSignedUpAt($signedUpAt)
    {
        $this->signedUpAt = $signedUpAt;
        return $this;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param mixed $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @param mixed $lastIp
     * @return User
     */
    public function setLastIp($lastIp)
    {
        $this->lastIp = $lastIp;
        return $this;
    }

    /**
     * @param mixed $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $userAgent
     * @return User
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * @param mixed $companies
     * @return User
     */
    public function setCompanies($companies)
    {
        $this->companies = $companies;
        return $this;
    }

    /**
     * @param mixed $lastRequestAt
     * @return User
     */
    public function setLastRequestAt($lastRequestAt)
    {
        $this->lastRequestAt = $lastRequestAt;
        return $this;
    }

    /**
     * @param mixed $unsubscribed
     * @return User
     */
    public function setUnsubscribed($unsubscribed)
    {
        $this->unsubscribed = $unsubscribed;

        return $this;
    }

    /**
     * @param array $customAttributes
     * @return User
     */
    public function setCustomAttributes($customAttributes)
    {
        $this->customAttributes = $customAttributes;
        return $this;
    }
}