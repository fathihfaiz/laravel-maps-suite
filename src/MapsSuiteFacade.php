<?php

namespace FathihFaiz\MapsSuite;

use Illuminate\Support\Facades\Facade;

class MapsSuiteFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mapsuite';
    }
}
