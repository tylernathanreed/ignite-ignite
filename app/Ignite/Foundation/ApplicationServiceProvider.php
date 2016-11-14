<?php

namespace App\Ignite\Foundation;

use Illuminate\Support\ServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerApplication();
        $this->registerPackages();
    }

    /**
     * Register the Ignite Application.
     *
     * @return void
     */
    protected function registerApplication()
    {
        $this->app->singleton('ignite', function ($app) {
            return new Application($app);
        });
    }

    /**
     * Register the Ignite Packages.
     *
     * @return void
     */
    protected function registerPackages()
    {
        $this->app['ignite']->registerConfiguredPackages();
    }

    /**
     * Register the specified Ignite Package.
     *
     * @param  string  $name     The Name of the Package.
     * @param  string  $package  The Class Path of the Package.
     *
     * @return void
     */
    protected function registerPackage($name, $package)
    {
        $this->app->singleton("ignite.{$name}", function ($app) {
            return new $package($app);
        });
    }
}
