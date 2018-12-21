<?php

namespace Shobi\Weatherapp\Weather;

use Shobi\Weatherapp\Weather\Units\Temparature;


class Weather
{
    private $temparature;

    private $summary;

    private $location;


    public function __construct(string $summary, string $temparature, string $location)
    {
        $this->temparature = new Temparature($temparature);
        $this->location    = $location;        
        $this->summary     = $summary;
    }

    public function __toString(): string
    {
        return $this->temparature->toDegreeCelsius() 
            . " Degree celsius with " 
            . $this->summary 
            . " in " 
            . $this->location;
    }
}