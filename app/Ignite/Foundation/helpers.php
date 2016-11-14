<?php

if(!function_exists('ignite'))
{
	/**
	 * Returns the Ignite Application Instance.
	 *
	 * @param  string|null  $package  The Ignite Package to Resolve.
	 *
	 * @return mixed
	 */
	function ignite($package = null)
	{
		// Return the Package if Specified
		if(!is_null($package))
			return app('ignite')->package($package);

		// Return the Ignite Application Instance.
		return app('ignite');
	}
}