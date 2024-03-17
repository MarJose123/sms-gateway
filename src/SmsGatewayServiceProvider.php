<?php

namespace MarJose123\SmsGateway;

use Illuminate\Support\Facades\File;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
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
            ->hasMigrations($this->migrationFiles())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('marjo123/sms-gateway');
            })
            ;
    }

    private function migrationFiles(): array
    {
        $migrationFiles = collect();
        foreach (File::files('../database/migrations') as $file) {
            $_file = pathinfo($file);
            $migrationFiles->push($_file['filename']);
        }
        return  $migrationFiles->flatten()->toArray();
    }
}
