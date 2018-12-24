<?php

namespace Shobi\Weatherapp\Contracts;

use Shobi\Weatherapp\Weather\Weather;

interface Endpoint
{
    /**
     * @param string $location
     * @return Weather
     */
    public function get($location): Weather;
}