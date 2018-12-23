<?php

namespace Shobi\Weatherapp;

use Shobi\Weatherapp\Http\Client;
use Shobi\Weatherapp\Endpoints\Current;

class WeatherApp 
{
    /**
     * @var Shobi\Weatherapp\Http\Client
     */
    private $client;

    /**
     * WeatherApp constructor.
     */
    public function __construct()
    {
        $this->client = new Client('6723df6a02149f85e517ad8d4836c748');
    }

    /**
     * @param string $location
     * @return Weather\Weather
     * @throws \Exception
     */
    public function current($location = 'london')
    {
        return (new Current($this->client))->get($location);
    }
}