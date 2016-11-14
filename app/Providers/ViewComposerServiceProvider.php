<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
	/**
	 * Maps various View Paths to View Composers.
	 *
	 * @var array
	 */
	protected $composers = [
		'*' => [
			\App\Http\Composers\AuthComposer::class
		],
		'models.permissions.*' => [
			\App\Http\Composers\PermissionsComposer::class
		]
	];

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Boot Class Based Composers
		foreach($this->composers as $view => $composers)
			$this->compose($view, $composers);
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Registers the specified Composers to the specified View(s).
	 *
	 * @param  string|array  $view       The specified View(s).
	 * @param  string|array  $composers  The specified Composer(s).
	 */
	protected function compose($view, $composers)
	{
		// Normalize the Composers to an Array
		if(!is_array($composers))
			$composers = [$composers];

		// Register each Composer
		foreach($composers as $composer)
			view()->composer($view, $composer);
	}
}
