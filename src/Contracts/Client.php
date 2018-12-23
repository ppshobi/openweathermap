<?php

namespace Shobi\Weatherapp\Contracts;

use Shobi\Weatherapp\Weather\Weather;

interface Client
{
    public function get(string $uri, array $query, array $options): string;
}