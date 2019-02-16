<?php


namespace Contingens\Intercom\Tests\fakes;


class Company
{
    protected $companyId;
    protected $createdAt;
    protected $name;
    protected $monthlySpend;
    protected $plan;
    protected $size;
    protected $website;
    protected $industry;
    protected $customAttributes = [];

    public function __construct($id)
    {
        $this->companyId = $id;
    }

    /**
     * @return mixed
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
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
    public function getMonthlySpend()
    {
        return $this->monthlySpend;
    }

    /**
     * @return mixed
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @return mixed
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * @return array
     */
    public function getCustomAttributes()
    {
        return $this->customAttributes;
    }

    /**
     * @param mixed $companyId
     * @return Company
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
        return $this;
    }

    /**
     * @param mixed $createdAt
     * @return Company
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @param mixed $name
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $monthlySpend
     * @return Company
     */
    public function setMonthlySpend($monthlySpend)
    {
        $this->monthlySpend = $monthlySpend;
        return $this;
    }

    /**
     * @param mixed $plan
     * @return Company
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
        return $this;
    }

    /**
     * @param mixed $size
     * @return Company
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param mixed $website
     * @return Company
     */
    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }

    /**
     * @param mixed $industry
     * @return Company
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;
        return $this;
    }

    /**
     * @param array $customAttributes
     * @return Company
     */
    public function setCustomAttributes($customAttributes)
    {
        $this->customAttributes = $customAttributes;
        return $this;
    }

    public function setRemoteCreatedAt(\DateTime $date)
    {
        $this->createdAt = $date;
        return $this;
    }
}