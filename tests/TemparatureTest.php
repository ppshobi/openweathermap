<?php
namespace Shobi\Weatherapp\Test;

use PHPUnit\Framework\TestCase;
use Shobi\Weatherapp\Weather\Units\Temperature;

class TemparatureTest extends TestCase
{
    public function test_it_can_convert_kelvin_to_degree()
    {
        $temparature = new Temperature(273.15);
        
        $this->assertEquals(0, $temparature->toDegreeCelsius());
    }

    public function test_it_can_convert_kelvin_to_kelvin()
    {
        $temparature = new Temperature(273.15);
        
        $this->assertEquals(273.15, $temparature->toKelvin());
    }
}
