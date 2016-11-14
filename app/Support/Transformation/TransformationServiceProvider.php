<?php

namespace App\Support\Transformation;

use Illuminate\Support\ServiceProvider;

class TransformationServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['transformation'] = $this->app->share(function() {
			return new MatrixManager($this->app);
		});

		$this->app->alias('transformation', MatrixManager::class);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
    {
		return ['transformation', MatrixManager::class];
	}
}