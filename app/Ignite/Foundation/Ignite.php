<?php

namespace App\Ignite\Foundation;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Ignite\Foundation\Application
 */
class Ignite extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
	protected static function getFacadeAccessor()
	{
		return 'ignite';
	}
}