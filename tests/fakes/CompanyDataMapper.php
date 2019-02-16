<?php


namespace Contingens\Intercom\Tests\fakes;


class CompanyDataMapper implements \Contingens\Intercom\CompanyDataMapper
{
    public function companyId($trackable)
    {
        return $trackable->getCompanyId();
    }

    public function createdAt($trackable)
    {
        return $trackable->getCreatedAt();
    }

    public function name($trackable)
    {
        return $trackable->getName();
    }

    public function monthlySpend($trackable)
    {
        return $trackable->getMonthlySpend();
    }

    public function plan($trackable)
    {
        return $trackable->getPlan();
    }

    public function size($trackable)
    {
        return $trackable->getSize();
    }

    public function website($trackable)
    {
        return $trackable->getWebsite();
    }

    public function industry($trackable)
    {
        return $trackable->getIndustry();
    }

    public function customAttributes($trackable)
    {
        return $trackable->getCustomAttributes();
    }
}