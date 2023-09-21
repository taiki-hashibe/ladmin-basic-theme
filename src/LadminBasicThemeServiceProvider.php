<?php

namespace LowB\LadminBasicTheme;

use Illuminate\Support\Facades\Blade;
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
        Blade::component('layouts-ladmin', \LowB\LadminBasicTheme\View\Components\LadminLayout::class);
        Blade::component('layouts-auth', \LowB\LadminBasicTheme\View\Components\AuthLayout::class);
        Blade::component('layouts-guest', \LowB\LadminBasicTheme\View\Components\GuestLayout::class);
    }
}
