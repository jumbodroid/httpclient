<?php

namespace Rayalois22\HttpClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class SampleFacadeAccessor
 *
 * @author  Alois Odhiambo  <rayalois22@gmail.com>
 */
class SampleFacadeAccessor extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'httpclient.sample';
    }
}
