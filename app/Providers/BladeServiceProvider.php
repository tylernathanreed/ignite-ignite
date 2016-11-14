<?php

namespace App\Providers;

use Auth;
use Blade;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
	//////////////////
	//* Attributes *//
	//////////////////
	/**
	 * Determines whether or not a @case directive should open a PHP Block.
	 *
	 * @var boolean
	 */
	protected $caseShouldOpen = true;

	///////////////////
	//* Boot Method *//
	///////////////////
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Compile all Directives
		$this->compileOptional();
		$this->compileError();
		$this->compileScript();
		$this->compileStylesheet();
	}

	///////////////////////
	//* Register Method *//
	///////////////////////
	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	//////////////////
	//* Directives *//
	//////////////////
	/**
	 * Add @optional and @endoptional for Complex Yielding.
	 *
	 * @return void
	 */
	private function compileOptional()
	{
		// Add @optional for Complex Yielding
		Blade::directive('optional', function($expression)
		{
			return "<?php if(trim(\$__env->yieldContent({$expression}))): ?>";
		});

		// Add @endoptional for Complex Yielding
		Blade::directive('endoptional', function($expression)
		{
			return "<?php endif; ?>";
		});
	}

	/**
	 * Add @error for Form Errors.
	 *
	 * @return void
	 */
	private function compileError()
	{
		// Add @error for Form Errors
		Blade::directive('error', function($expression)
		{
			return "<?php if(\$errors->has($expression)): ?><span class=\"help-block\"><strong><?php echo \$errors->first($expression); ?></strong></span><?php endif; ?>";
		});
	}

	/**
	 * Add @script for <script> Libraries.
	 *
	 * @return void
	 */
	private function compileScript()
	{
		// Add @script for <script> Libraries.
		Blade::directive('script', function($expression)
		{
			return "<script src=\"<?php echo {$expression}; ?>\"></script>";
		});
	}

	/**
	 * Add @stylesheet for <link> Stylesheets.
	 *
	 * @return void
	 */
	private function compileStylesheet()
	{
		// Add @stylesheet for Form Errors
		Blade::directive('stylesheet', function($expression)
		{
			return "<link href={$expression} rel=\"stylesheet\" type=\"text/css\">";
		});
	}
}
