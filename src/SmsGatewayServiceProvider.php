<?php

namespace MarJose123\SmsGateway;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
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
            ->hasRoute('api')
            ->hasMigrations([
                'create_sms_gateway_table',
            ])
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('marjo123/sms-gateway');
            });
    }

}
