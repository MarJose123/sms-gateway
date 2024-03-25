<?php

namespace MarJose123\SmsGateway\Facades\Contracts;

interface SmsPorter
{
    /**
     * @description if true, then the user can send SMS
     */
    public function canSendSms(): bool;

    /**
     * @description if true, then all the data will be visible to the current logged-in user
     */
    public function canSeeAll(): bool;
}
