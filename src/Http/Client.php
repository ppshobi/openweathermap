<?php
namespace Shobi\Weatherapp\Http;


use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Middleware;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\RequestInterface;

class Client
{
    /**
     * The API's base URI
     */
    const BASE_URL = 'api.openweathermap.org/data/';

    /**
     * The API's version string
     */
    const VERSION = '2.5';


    /**
     * Endpoint
     */

    const ENDPOINT = 'weather';

    /**
     * The HTTP client
     *
     * @var \GuzzleHttp\Client
     */
    protected $http;

    /**
     * Construct the HTTP client and passing the
     * token for authorization
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->http = $this->http ? : $this->getHttpClient($token);
    }

    /**
     * Sends a GET Request
     *
     * @param string $uri
     * @param array $query
     * @param array $options
     *
     * @return string JSON
     */
    public function get(string $uri, array $query = [], array $options = [])
    {
        $uri      = $uri .'?'. http_build_query($query);
        $response = $this->http->request('GET', $uri, $options);

        return (string) $response->getBody()->getContents();
    }

    /**
     * Constructs the HTTP client
     *
     * @param string $token
     *
     * @return \GuzzleHttp\Client
     */
    private function getHttpClient(string $token)
    {
        $stack = $this->getHandlerStack($token);

        return new GuzzleClient([
            'base_uri' => self::BASE_URL . self::VERSION . '/' . self::ENDPOINT,
            'handler'  => $stack
        ]);
    }

    /**
     * Creates Guzzle Handler stack
     * Also appends the APP ID to every request
     *
     * @param string $token
     *
     * @return \GuzzleHttp\HandlerStack $stack
     */
    private function getHandlerStack(string $token)
    {
        $stack = HandlerStack::create(new CurlHandler());

        $stack->push(Middleware::mapRequest(function (RequestInterface $request) use($token) {
            return ! $this->containsAccessToken($request)
                ? $request->withUri(Uri::withQueryValue($request->getUri(), 'APPID', $token))
                : $request;
        }));

        return $stack;
    }

    /**
     * Checks if the request already contains an oauth_token
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return bool
     */
    private function containsAccessToken(RequestInterface $request)
    {
        if (strpos($request->getUri()->getQuery(), 'APPID') !== false) {
            return true;
        }

        return false;
    }
}