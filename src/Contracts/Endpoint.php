<?php

namespace Shobi\Weatherapp\Contracts;

use Shobi\Weatherapp\Weather\Weather;

interface Endpoint
{
    public function get(): Weather;
}