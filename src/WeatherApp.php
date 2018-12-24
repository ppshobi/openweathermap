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
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $location
     * @return Weather\Weather
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function current($location = 'london')
    {
        return (new Current($this->client))->get($location);
    }
}