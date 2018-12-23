<?php
namespace Shobi\Weatherapp\Test;

use PHPUnit\Framework\TestCase;
use Shobi\Weatherapp\WeatherApp;
use Shobi\Weatherapp\Weather\Weather;

class WeatherTest extends TestCase
{

    public function test_it_returns_a_weather_object_on_successfull_fetch()
    {
        $stub = $this->getMockBuilder('Shobi\WeatherApp\Http\Client')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn(fopen('tests/stubs/weatherinfo', "r"));
      
        $this->assertInstanceOf(Weather::class, (new WeatherApp())->current());
    }

    public function test_it_throws_an_exception_if_location_is_notfound()
    {
        $this->expectException(\Exception::class);

        (new WeatherApp())->current("abxxxx");
    }
}
