<?php

namespace LowB\LadminBasicTheme\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \LowB\LadminBasicTheme\LadminBasicTheme
 */
class LadminBasicTheme extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \LowB\LadminBasicTheme\LadminBasicTheme::class;
    }
}
