<?php

namespace LowB\LadminBasicTheme\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use LowB\LadminBasicTheme\LadminBasicThemeServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected $fakeClient = null;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'LowB\\LadminBasicTheme\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LadminBasicThemeServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_ladmin-basic-theme_table.php.stub';
        $migration->up();
        */
    }
}
