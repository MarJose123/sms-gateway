<?php

namespace MarJose123\SmsGateway;

use MarJose123\SmsGateway\Commands\SmsGatewayCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasMigration('create_sms-gateway_table')
            ->hasCommand(SmsGatewayCommand::class);
    }
}
