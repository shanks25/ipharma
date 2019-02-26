<?php

namespace Epharma\Lib;

use Illuminate\Support\Facades\Facade;

class ThemeFacade extends Facade
{
    /**
     * The name of the binding in the IoC container.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Theme';
    }
}