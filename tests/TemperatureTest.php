<?php
namespace Shobi\Weatherapp\Test;

use PHPUnit\Framework\TestCase;
use Shobi\Weatherapp\Weather\Units\Temperature;

class TemperatureTest extends TestCase
{
    public function test_it_can_convert_kelvin_to_degree()
    {
        $temperature = new Temperature(273.15);

        $this->assertEquals(0, $temperature->toDegreeCelsius());
    }

    public function test_it_can_convert_kelvin_to_kelvin()
    {
        $temperature = new Temperature(273.15);

        $this->assertEquals(273.15, $temperature->toKelvin());
    }
}
