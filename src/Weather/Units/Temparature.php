<?php

namespace Shobi\Weatherapp\Weather\Units;

class Temparature 
{
    private $kelvin;

    public function __construct($kelvin)
    {
        $this->kelvin = $kelvin;
    }

    public function toDegreeCelsius()
    {
        return $this->kelvin - 273.15;
    }
}