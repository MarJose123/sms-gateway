<?php

namespace MarJose123\SmsGateway;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use MarJose123\SmsGateway\Commands\SmsGatewayCommand;

class SmsGatewayServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('sms-gateway')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations([])
            ->runsMigrations()
            ;
    }
}
