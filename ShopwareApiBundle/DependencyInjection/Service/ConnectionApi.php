<?php

namespace App\LmaDev\ShopwareApiBundle\DependencyInjection\Service;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ConnectionApi
{
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
     * @param string $user
     * @param string $apiKey
     */
    public function __construct(string $user, string $apiKey)
    {
        $this->user = $user;
        $this->apiKey = $apiKey;
    }

    /**
     * @return HttpClientInterface
     */
    public function call() : HttpClientInterface
    {
        $httpClient = HttpClient::create([
            'auth_basic' => [$this->user, $this->apiKey],
        ]);

        return $httpClient;
    }
}