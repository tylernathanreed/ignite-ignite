<?php

namespace App\Support\Transformation;

use Illuminate\Support\Facades\Facade as BaseFacade;

/**
 * @see \App\Support\Transformation\MatrixManager
 */
class Facade extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'transformation';
    }
}
