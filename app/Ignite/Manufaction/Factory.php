<?php

namespace App\Ignite\Manufaction;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Ignite\Manufaction\FactoryManager
 */
class Factory extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
	protected static function getFacadeAccessor()
	{
		return 'ignite.factory';
	}
}