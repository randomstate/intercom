<?php

namespace Contingens\Intercom;

use DateTime;

interface CompanyDataMapper
{
    /** @return string */
    public function companyId($trackable);

    /** @return DateTime */
    public function createdAt($trackable);

    /** @return string */
    public function name($trackable);

    /** @return float */
    public function monthlySpend($trackable);

    /** @return string */
    public function plan($trackable);

    /** @return int */
    public function size($trackable);

    /** @return string */
    public function website($trackable);

    /** @return string */
    public function industry($trackable);

    /** @return string[] */
    public function customAttributes($trackable);
}