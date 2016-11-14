<?php

namespace App\Ignite\Manufaction;

use Illuminate\Support\ServiceProvider;

class ManufactionServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFactoryManager();
    }

    /**
     * Register the Factory Manager.
     *
     * @return void
     */
    protected function registerFactoryManager()
    {
        $this->app->singleton('ignite.factory', function ($app) {
            return new Manager($app);
        });
    }
}
