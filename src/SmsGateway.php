<?php

namespace MarJose123\SmsGateway;

use Illuminate\Support\Facades\Auth;

class SmsGateway
{
    public function userCanSendSms(): bool
    {
        return (Auth::user() instanceof Facades\Contracts\ISmsPorter) ? Auth::user()->canSendSms() : true;
    }
}
