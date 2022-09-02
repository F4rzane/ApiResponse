<?php

namespace App\Responses\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Responses\Response
 */
class ApiResponse extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ApiResponse';
    }
}
