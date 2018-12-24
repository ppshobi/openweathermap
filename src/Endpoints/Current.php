<?php

namespace Shobi\Weatherapp\Endpoints;

use Shobi\Weatherapp\Http\Client;
use Shobi\Weatherapp\Weather\Weather;
use Shobi\Weatherapp\Contracts\Endpoint;

class Current implements Endpoint
{
    const ENDPOINT = 'weather';

    private $client;

    /**
     * Current constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $location
     * @return Shobi\Weatherapp\Weather\Weather
     *
     * @throws GuzzleHttp\Exception\ClientException\ClientException
     * fetches the current weather data from the api
     */
    public function get($location = "london") : Weather
    {
        $reponse  = json_decode($this->client->get(self::ENDPOINT, ['q' => $location]), true);
                
        $description = $reponse['weather'][0]['description'];
        $temparature = $reponse['main']['temp'];
        $location    = $reponse['name'];

        return new Weather($description, $temparature, $location);
    }
}