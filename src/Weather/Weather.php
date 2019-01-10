<?php

namespace Shobi\Weatherapp\Weather;

use Shobi\Weatherapp\Weather\Units\Temperature;

class Weather
{
    /**
     * @var Shobi\Weatherapp\Weather\Units\Temperature
     */
    private $temperature;

    /**
     * the weather summary
     * @var string
     */
    private $summary;

    /**
     * @var string
     */
    private $location;

    /**
     * Weather constructor.
     * @param string $summary
     * @param string $temperature
     * @param string $location
     */
    public function __construct(string $summary, string $temperature, string $location)
    {
        $this->temperature = new Temperature($temperature);
        $this->location    = $location;
        $this->summary     = $summary;
    }

    /**
     * Returns the Temperature
     *
     * @return \Shobi\Weatherapp\Weather\Units\Temperature
     */
    public function getTemperature(): Temperature
    {
        return $this->temperature;
    }
    /**
     * Returns the weather summary
     *
     * @return string
     */
    public function getSummary(): string
    {
        return $this->summary;
    }
    /**
     * Returns the location
     *
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->temperature->toDegreeCelsius()
            . " Degree celsius with "
            . $this->summary
            . " in "
            . $this->location;
    }
}