<?php

namespace MarJose123\SmsGateway\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MarJose123\SmsGateway\SmsGateway
 */
class SmsGateway extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \MarJose123\SmsGateway\SmsGateway::class;
    }
}
