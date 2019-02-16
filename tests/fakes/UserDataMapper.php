<?php


namespace Contingens\Intercom\Tests\fakes;


class UserDataMapper implements \Contingens\Intercom\UserDataMapper
{
    public function userId($trackable)
    {
        return $trackable->getUserId();
    }

    public function signedUpAt($trackable)
    {
        return $trackable->getSignedUpAt();
    }

    public function email($trackable)
    {
        return $trackable->getEmail();
    }

    public function phone($trackable)
    {
        return $trackable->getPhone();
    }

    public function lastSeenIp($trackable)
    {
        return $trackable->getLastIp();
    }

    public function name($trackable)
    {
        return $trackable->getName();
    }

    public function userAgent($trackable)
    {
        return $trackable->getUserAgent();
    }

    public function companies($trackable)
    {
        return $trackable->getCompanies();
    }

    public function lastRequestAt($trackable)
    {
        return $trackable->getLastRequestAt();
    }

    public function hasUnsubscribed($trackable)
    {
        return $trackable->hasUnsubscribed();
    }

    public function customAttributes($trackable)
    {
        return $trackable->getCustomAttributes();
    }
}