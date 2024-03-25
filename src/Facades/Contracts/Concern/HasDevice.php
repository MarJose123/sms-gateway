<?php

namespace MarJose123\SmsGateway\Facades\Contracts\Concern;

use MarJose123\SmsGateway\Models\Devices;

trait HasDevice
{
    public function devices()
    {
        return $this->hasMany(Devices::class, 'user');
    }

    public function canSendSms(): bool
    {
        return true;
    }

    /**
     * @description if true, then all the data will be visible to the current logged-in user
     */
    public function canSeeAll(): bool
    {
        return true;
    }
}
