<?php

namespace App\Models;

use App\Support\Traits\Resolveable;
use App\Support\Traits\CacheQueryBuilder;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    //////////////
    //* Traits *//
    //////////////
    /**
     * For Caching all Queries.
     */
    use CacheQueryBuilder;

    /**
     * For Dynamic Resolution.
     */
    use Resolveable;
}
