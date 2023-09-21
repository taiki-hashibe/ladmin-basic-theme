<?php

namespace LowB\LadminBasicTheme;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LadminBasicThemeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('ladmin-basic-theme')
            ->hasViews()
            ->hasAssets()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->publishAssets();
            });
        Blade::component('layouts-base', \LowB\LadminBasicTheme\View\Components\BaseLayout::class);
        Blade::component('layouts-auth', \LowB\LadminBasicTheme\View\Components\AuthLayout::class);
        Blade::component('layouts-guest', \LowB\BasicTheme\View\Components\GuestLayout::class);
    }
}
