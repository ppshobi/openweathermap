<?php
namespace Shobi\Weatherapp\Test;

use Shobi\Weatherapp\Http\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    private $client;

    public function setUp()
    {
        $this->client = new Client('token');
    }

    public function test_it_can_make_a_get_request()
    {
        $response = $this->client->get('https://httpbin.org/user-agent');

        $this->assertRegexp('/Guzzle/', json_decode($response)->{"user-agent"});
    }
}
