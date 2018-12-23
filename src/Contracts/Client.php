<?php

namespace Shobi\Weatherapp\Contracts;

interface Client
{
    /**
     * @param string $uri
     * @param array $query
     * @param array $options
     * @return string
     */
    public function get(string $uri, array $query, array $options): string;
}