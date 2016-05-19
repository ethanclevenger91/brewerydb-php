<?php namespace Ethanclevenger91\BreweryDb;

use Illuminate\Support\Facades\Facade;

class BreweryDbFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'brewerydb';
    }
}
