<?php

namespace Contingens\Intercom;

use DateTime;

interface UserDataMapper
{
    /** @return string */
    public function userId($trackable);

    /** @return DateTime */
    public function signedUpAt($trackable);

    /** @return string */
    public function email($trackable);

    /** @return string */
    public function phone($trackable);

    /** @return string */
    public function lastSeenIp($trackable);

    /** @return string  */
    public function name($trackable);

    /** @return string */
    public function userAgent($trackable);

    /** @return array */
    public function companies($trackable);

    /** @return DateTime */
    public function lastRequestAt($trackable);

    /** @return bool */
    public function hasUnsubscribed($trackable);

    /** @return string[] */
    public function customAttributes($trackable);
}