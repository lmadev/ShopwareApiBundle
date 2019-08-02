<?php

namespace App\LmaDev\ShopwareApiBundle\DependencyInjection\Service;

use GuzzleHttp\Client;

class ConnectionApi
{
    /**
     * @var string
     */
    private $baseUri;
    /**
     * @var string
     */
    private $user;
    /**
     * @var string
     */
    private $apiKey;
    /**
     * ConnectionApi constructor.
     * @param string $baseUri
     * @param string $user
     * @param string $apiKey
     */
    public function __construct(string $user, string $apiKey, string $baseUri)
    {
        $this->baseUri = $baseUri;
        $this->user = $user;
        $this->apiKey = $apiKey;
    }

    /**
     * @return Client
     */
    public function call() : Client
    {
        $httpClient = new Client([
            'base_uri' => $this->baseUri,
            'timeout'  => 2.0,
            'auth'     =>
                [$this->user, $this->apiKey]
        ]);
        return $httpClient;
    }
}