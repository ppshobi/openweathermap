<?php

namespace Shobi\Weatherapp;

use Shobi\Weatherapp\Http\Client;
use Shobi\Weatherapp\Endpoints\Current;

class WeatherApp 
{
    private $client;

    public function __construct()
    {
        $this->client = new Client('6723df6a02149f85e517ad8d4836c748');
    }

    public function current($location = 'london') 
    {
        return (new Current($this->client))->get($location);
    }
}