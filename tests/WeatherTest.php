<?php
namespace Shobi\Weatherapp\Test;

use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;
use Shobi\Weatherapp\WeatherApp;
use Shobi\Weatherapp\Weather\Weather;
use GuzzleHttp\Exception\ClientException;

class WeatherTest extends TestCase
{

    public function test_it_returns_a_weather_object_on_successfull_fetch()
    {
        $mock = $this->getMockBuilder('Shobi\Weatherapp\Http\Client')
                     ->disableOriginalConstructor()->getMock();

        $mock->method('get')->willReturn(file_get_contents('tests/stubs/weatherinfo'));
      
        $this->assertInstanceOf(Weather::class, (new WeatherApp($mock))->current());
    }

    public function test_it_throws_an_exception_if_location_is_notfound()
    {
        $mock = $this->getMockBuilder('Shobi\Weatherapp\Http\Client')
                     ->disableOriginalConstructor()->getMock();

        $mock->method('get')
             ->willThrowException(new ClientException("Location not present",
                new Request("get", "http://httpbin.org/get"))
            );

        $this->expectException(ClientException::class);

        (new WeatherApp($mock))->current("abxxxx");
    }
}
