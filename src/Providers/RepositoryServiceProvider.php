<?php

namespace MarJose123\SmsGateway\Providers;

use Illuminate\Support\ServiceProvider;
use MarJose123\SmsGateway\Facades\Contracts\Interface\Device as DeviceInterface;
use MarJose123\SmsGateway\Facades\Contracts\Concern\Device as DeviceRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(DeviceInterface::class, DeviceRepository::class);
    }
}
