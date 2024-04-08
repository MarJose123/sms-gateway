<?php

namespace MarJose123\SmsGateway\Facades\Contracts\Concern;

use Illuminate\Database\Eloquent\Relations\HasMany;
use MarJose123\SmsGateway\Models\Contacts;
use MarJose123\SmsGateway\Models\Devices;
use MarJose123\SmsGateway\Models\Messages;

trait HasDevice
{
    public function devices(): HasMany
    {
        return $this->hasMany(Devices::class, 'user');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Messages::class, 'user');
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contacts::class, 'user');
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
