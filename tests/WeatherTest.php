<?php
namespace Shobi\Weatherapp\Test;

use PHPUnit\Framework\TestCase;
use Shobi\Weatherapp\WeatherApp;
use Shobi\Weatherapp\Http\Client;
use Shobi\Weatherapp\Weather\Weather;

class WeatherTest extends TestCase
{

    public function test_it_returns_a_weather_object_on_successfull_fetch()
    {
        $stub = $this->getMockBuilder('Shobi\Weatherapp\Http\Client')->disableOriginalConstructor()->getMock();
        $stub->method('get')->willReturn(file_get_contents('tests/stubs/weatherinfo'));
      
        $this->assertInstanceOf(Weather::class, (new WeatherApp($stub))->current());
    }

    public function test_it_throws_an_exception_if_location_is_notfound()
    {
        $this->expectException(\GuzzleHttp\Exception\ClientException::class);

        (new WeatherApp(new Client('xxxx')))->current("abxxxx");
    }
}
