<?php

interface SmsPorter
{
    public function canSendSms(): bool{}

    /**
     * @return bool
     * @description if true, then all the data will be visible to the current logged-in user
     */
    public function canSeeAll(): bool{}
}
