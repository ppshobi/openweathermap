<?php

namespace Shobi\Weatherapp\Weather\Units;

class Temperature
{
    /**
     * the temperature stored as kelvin
     */
    private $kelvin;

    /**
     * Temperature constructor.
     * @param $kelvin
     */
    public function __construct($kelvin)
    {
        $this->kelvin = $kelvin;
    }

    /**
     * converts the temperature to degree celsius
     * @return float
     */
    public function toDegreeCelsius()
    {
        return $this->kelvin - 273.15;
    }

    /**
     * converts the temperature to kelvin
     * @return float
     */
    public function toKelvin()
    {
        return $this->kelvin;
    }
}